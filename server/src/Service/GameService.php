<?php

namespace App\Service;

use App\Dto\Incoming\CreateGameDto;
use App\Dto\Incoming\EditGameDto;
use App\Dto\Outgoing\GameResponseDto;
use App\Dto\Outgoing\RollResponseDto;
use App\Dto\Outgoing\RoundResponseDto;
use App\Entity\Game;
use App\Entity\Roll;
use App\Entity\Round;
use App\Repository\GameRepository;
use App\Repository\PlayerRepository;
use App\Repository\RoundRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;

class GameService extends AbstractMultiTransformer
{
    private GameRepository $gameRepository;
    private PlayerRepository $playerRepository;
    private EntityManagerInterface $entityManager;
    private LoggerInterface $logger;

    /**
     * @param GameRepository $gameRepository
     * @param PlayerRepository $playerRepository
     * @param EntityManagerInterface $entityManager
     * @param LoggerInterface $logger
     */
    public function __construct(GameRepository $gameRepository, PlayerRepository $playerRepository, EntityManagerInterface $entityManager, LoggerInterface $logger)
    {
        $this->gameRepository = $gameRepository;
        $this->playerRepository = $playerRepository;
        $this->entityManager = $entityManager;
        $this->logger = $logger;
    }

    /**
     * @param CreateGameDto $createGameDto
     * @return GameResponseDto
     */
    public function createGame(CreateGameDto $createGameDto): GameResponseDto
    {
        $game = new Game();
        $game->setPlayerOneId($createGameDto->getPlayerOneId());
        $game->setPlayerTwoId($createGameDto->getPlayerTwoId());
        $game->setPlayerOneScore(0);
        $game->setPlayerTwoScore(0);
        $this->entityManager->persist($game);
        $this->entityManager->flush();

        $round = new Round();
        $round->setGame($game);
        $round->setPlayerOneScore(0);
        $round->setPlayerTwoScore(0);
        $game->addRound($round);
        $this->entityManager->persist($round);

        $this->entityManager->flush();

        return $this->transformFromObject($game);
    }

    /**
     * @param EditGameDto $dto
     * @return Game|null
     */
    public function editGame(EditGameDto $dto): ?Game
    {
        $game = $this->gameRepository->find($dto->getGameId());

        foreach ($dto->getRound() as $roundDto) {
            $round = new Round();
            foreach ($roundDto->getRolls() as $rollDto) {
                $roll = new Roll();
                $roll->setValue($rollDto->getValue());
                $round->addRoll($roll);
            }
            $game->addRound($round);
        }

        $this->entityManager->persist($game);
        $this->entityManager->flush();

        return $game;
    }


    /**
     * @return iterable
     */
    public function getAllGames(): iterable
    {
        $allGames = $this->gameRepository->findAll();
        $gamesDtos = [];

        foreach ($allGames as $game){
            $gamesDtos[] = $this->transformFromObject($game);
        }
        return $gamesDtos;
    }

    /**
     * @param $object
     * @return GameResponseDto
     */
    public function transformFromObject($object): GameResponseDto
    {
        $dto = new GameResponseDto();
        $dto->setGameId($object->getGameId());
        $dto->setPlayerOneId($object->getPlayerOneId());
        $dto->setPlayerTwoId($object->getPlayerTwoId());
        $dto->setPlayerOneScore($object->getPlayerOneScore());
        $dto->setPlayerTwoScore($object->getPlayerTwoScore());

        $rounds = [];
        foreach ($object->getRound() as $round) {
            $roundDto = new RoundResponseDto();
            $roundDto->setRoundId($round->getRoundId());

            $rolls = [];
            foreach ($round->getRolls() as $roll) {
                $rollDto = new RollResponseDto();
                $rollDto->setRollId($roll->getRollId());
                $rolls[] = $rollDto;
            }
            $roundDto->setRolls($rolls);

            $rounds[] = $roundDto;
        }

        $dto->setRounds($rounds);

        return $dto;
    }
}