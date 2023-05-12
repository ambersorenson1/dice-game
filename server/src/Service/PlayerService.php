<?php

namespace App\Service;

use App\Repository\PlayerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;

class PlayerService extends AbstractMultiTransformer
{
    private EquityManagerInterface $entityManager;
    private PlayerRepository $playerRepository;
    private LoggerInterface $logger;

    /**
     * @param EntityManagerInterface $entityManager
     * @param PlayerRepository $playerRepository
     * @param LoggerInterface $logger
     */
    public function __construct(EntityManagerInterface $entityManager, PlayerRepository $playerRepository, LoggerInterface $logger)
    {
        $this->entityManager = $entityManager;
        $this->playerRepository = $playerRepository;
        $this->logger = $logger;
    }

    public function createPlayer()

    public function transformFromObject($object)
    {
        // TODO: Implement transformFromObject() method.
    }
}