<?php

namespace App\Service;

use App\Dto\Outgoing\RollResponseDto;
use App\Repository\PlayerRepository;
use App\Repository\RollRepository;

class RollService extends AbstractMultiTransformer
{
    private PlayerRepository $playerRepository;
    private RollRepository $rollRepository;

    /**
     * @param PlayerRepository $playerRepository
     * @param RollRepository $rollRepository
     */
    public function __construct(PlayerRepository $playerRepository, RollRepository $rollRepository)
    {
        $this->playerRepository = $playerRepository;
        $this->rollRepository = $rollRepository;
    }

    /**
     * @param int $id
     * @return array
     */
    public function getValuesByPlayerId(int $id): array
    {
        $values = $this->rollRepository->findBy(['player_id' => $id]);

        $responseDtos = [];
        foreach ($values as $value) {
            $responseDtos[] = $this->transformFromObject($value);
        }

        return $responseDtos;
    }


    /**
     * @param $object
     * @return RollResponseDto
     */
    public function transformFromObject($object): RollResponseDto
    {
        $dto = new RollResponseDto();
        $dto->setRollId($object->getRollId());
        $dto->setRoundId($object->getRoundId());
        $dto->setValue($object->getValue());
        $dto->setPlayerId($object->getPlayerId());

        return $dto;
    }

}