<?php

namespace App\Service;

use App\Dto\Incoming\CreateGameDto;
use App\Dto\Incoming\EditGameDto;
use App\Dto\Outgoing\GameResponseDto;
use App\Entity\Game;
use App\Repository\GameRepository;
use App\Repository\PlayerRepository;
use App\Service\AbstractMultiTransformer;
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
    public function __construct(GameRepository $gameRepository, PlayerRepository $playerRepository, EntityManagerInterface $entityManager, LoggerInterface $logger )
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
        $game->setPlayerOneScore($createGameDto->getPlayerOneScore());
        $game->setPlayerTwoScore($createGameDto->getPlayerTwoScore());
        $this->entityManager->persist($game);
        $this->entityManager->flush();

        return $this->transformFromObject($game);
    }

    /**
     * @param $game
     * @return GameResponseDto
     */
    public function transformFromObject($object):GameResponseDto
    {
        $dto = new GameResponseDto();
        $dto->setGameId($object->getGameId());
        $dto->setPlayerOneId($object->getPlayerOneId());
        $dto->setPlayerTwoId($object->getPlayerTwoId());
        $dto->setPlayerOneScore($object->getPlayerOneScore());
        $dto->setPlayerTwoScore($object->getPlayerTwoScore());

        return $dto;
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
     * @param EditGameDto $dto
     * @return Game|null
     */
    public function editGame(EditGameDto $dto): ?Game
    {
        $game = $this->gameRepository->find($dto->getGameId());
        $game->setPlayerOneScore(($dto->getPlayerOneScore()));
        $game->setPlayerTwoScore(($dto->getPlayerTwoScore()));
        $this->entityManager->persist($game);
        $this->entityManager->flush();

        return $game;
    }
}