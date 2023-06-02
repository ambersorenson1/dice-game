<?php

namespace App\Service;

use App\Dto\Outgoing\RollResponseDto;
use App\Repository\RollRepository;

class RollService
{
    private RollRepository $rollRepository;

    /**
     * @param RollRepository $rollRepository
     */
    public function __construct(RollRepository $rollRepository)
    {
        $this->rollRepository = $rollRepository;
    }

    /**
     * @param $object
     * @return RollResponseDto
     */
    public function transformToObject($object): RollResponseDto
    {
        $dto = new RollResponseDto();
        $dto->setRollId($object->getRollId());
        $dto->setValue($object->getValue());

        return $dto;
    }

}