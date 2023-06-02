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
use Exception;
use Psr\Log\LoggerInterface;
use function PHPUnit\Framework\throwException;

class GameService extends AbstractMultiTransformer
{
    private GameRepository $gameRepository;
    private PlayerRepository $playerRepository;
    private EntityManagerInterface $entityManager;
    private LoggerInterface $logger;
    private RoundRepository $roundRepository;
    private RoundService $roundService;

    /**
     * @param GameRepository $gameRepository
     * @param PlayerRepository $playerRepository
     * @param EntityManagerInterface $entityManager
     * @param LoggerInterface $logger
     * @param RoundRepository $roundRepository
     * @param RoundService $roundService
     */
    public function __construct(GameRepository $gameRepository, PlayerRepository $playerRepository, EntityManagerInterface $entityManager, LoggerInterface $logger, RoundRepository $roundRepository, RoundService $roundService)
    {
        $this->gameRepository = $gameRepository;
        $this->playerRepository = $playerRepository;
        $this->entityManager = $entityManager;
        $this->logger = $logger;
        $this->roundRepository = $roundRepository;
        $this->roundService = $roundService;
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
        $this->entityManager->persist($game);
        $this->entityManager->flush();
        return $this->transformFromObject($game);
    }

    /**
     * @param EditGameDto $dto
     * @return GameResponseDto
     */
    public function editGame(EditGameDto $dto): GameResponseDto
    {
        $game = $this->gameRepository->find($dto->getGameId());
        foreach ($dto->getRounds() as $roundDto) {
            $roundEntity = new Round();
            $roundEntity->setPlayerOneScore($roundDto->getPlayerOneScore());
            $roundEntity->setPlayerTwoScore($roundDto->getPlayerTwoScore());
            $rolls = $roundDto->getRolls();
            foreach ($rolls as $rollValue) {
                $rollEntity = new Roll();
                $rollEntity->setValue($rollValue);
                $rollEntity->setRound($roundEntity);
                $roundEntity->addRoll($rollEntity);
            }

            $game->addRound($roundEntity);
        }

        $this->entityManager->persist($game);
        $this->entityManager->flush();

        return $this->transformFromObject($game);
    }


//    /**
//     * @throws Exception
//     */
//    public function startNewRound(int $gameId): Round
//    {
//        $game = $this->$this->gameRepository->find($gameId);
//        if(count($game->getRound()) >=5) {
//            throw new Exception('Maximum number of rounds reached for this game.');
//        }
//        $round = new Round();
//        $game->addRound($round);
//
//        $this->entityManager->persist($round);
//        $this->entityManager->flush();
//
//        return $round;
//    }



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
     * @param int $gameId
     * @return GameResponseDto
     */
    public function getGameById(int $gameId): GameResponseDto
    {
        $game = $this->gameRepository->find($gameId);
        return $this->transformFromObject($game);
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

        $roundsDto = [];
        foreach($object->getRounds() as $round) {
            $roundsDto[] = $this->roundService->transformToObject($round);
        }

        $dto->setRounds($roundsDto);

        return $dto;
    }

}