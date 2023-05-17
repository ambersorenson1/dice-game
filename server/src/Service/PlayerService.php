<?php

namespace App\Service;

use App\Dto\Incoming\CreatePlayerDto;
use App\Dto\Incoming\EditPlayerDto;
use App\Dto\Outgoing\PlayerResponseDto;
use App\Entity\Player;
use App\Repository\PlayerRepository;
use App\Repository\RoleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;

class PlayerService extends AbstractMultiTransformer
{
    private EntityManagerInterface $entityManager;
    private PlayerRepository $playerRepository;
    private LoggerInterface $logger;
    private RoleRepository $roleRepository;

    /**
     * @param EntityManagerInterface $entityManager
     * @param PlayerRepository $playerRepository
     * @param LoggerInterface $logger
     * @param RoleRepository $roleRepository
     */
    public function __construct(EntityManagerInterface $entityManager, PlayerRepository $playerRepository, LoggerInterface $logger, RoleRepository $roleRepository)
    {
        $this->entityManager = $entityManager;
        $this->playerRepository = $playerRepository;
        $this->logger = $logger;
        $this->roleRepository = $roleRepository;
    }

    /**
     * @param CreatePlayerDto $createPlayerDto
     * @return PlayerResponseDto
     */
    public function createPlayer(CreatePlayerDto $createPlayerDto): PlayerResponseDto
    {
        $player = new Player();
        $player->setFirstName($createPlayerDto->getFirstName());
        $player->setLastName($createPlayerDto->getLastName());
        $player->setBackgroundColor($createPlayerDto->getBackgroundColor());
        $player->setForegroundColor($createPlayerDto->getForegroundColor());
        $player->setEmail($createPlayerDto->getEmail());
        $player->setPassword($createPlayerDto->getPassword());
        $role = $this->roleRepository->find(2);
        $player->setRole($role);
//        $player->setAuth0($createPlayerDto->getAuth0());
        $this->entityManager->persist($player);
        $this->entityManager->flush();

        return $this->transformFromObject($player);
    }

    /**
     * @param Player $object
     * @return PlayerResponseDto
     */


    public function transformFromObject($object): PlayerResponseDto
    {
       $dto = new PlayerResponseDto();
       $dto->setPlayerId($object->getPlayerId());
       $dto->setFirstName($object->getFirstName());
       $dto->setLastName($object->getLastName());
       $dto->setBackgroundColor($object->getBackgroundColor());
       $dto->setForegroundColor($object->getForegroundColor());
       $dto->setEmail($object->getEmail());
       $dto->setPassword($object->getPassword());

       return $dto;
    }

    /**
     * @return PlayerResponseDto[]
     */
    public function getPlayers(): iterable
    {
        $allPlayers = $this->playerRepository->findAll();
        $playerDtos = [];

        foreach ($allPlayers as $player) {
            $playerDtos[] = $this->transformFromObject($player);
        }

        return $playerDtos;
    }

    /**
     * @param EditPlayerDto $dto
     * @return Player
     */
    public function editPlayer(EditPlayerDto $dto): Player
    {
        $player = $this->playerRepository->find($dto->getId());
        $player->setFirstName($dto->getFirstName());
        $player->setLastName($dto->getLastName());
        $player->setBackgroundColor($dto->getBackgroundColor());
        $player->setForegroundColor($dto->getForegroundColor());
        $player->setEmail($dto->getEmail());
        $player->setPassword($dto->getPassword());

        $this->entityManager->persist($player);
        $this->entityManager->flush();

        return $player;
    }

    /**
     * @param int $playerId
     * @return bool
     */
    public function deletePlayer(int $playerId): bool
    {
        $player = $this->playerRepository->find($playerId);
        $this->entityManager->remove(($player));
        $this->entityManager->flush();
        return true;

    }
}