<?php

namespace App\Service;

use App\Dto\Outgoing\RoundResponseDto;


class RoundService
{
    private RollService $rollService;

    public function __construct(RollService $rollService)
    {
        $this->rollService = $rollService;
    }

    public function transformToObject($round): RoundResponseDto
    {
        $roundDto = new RoundResponseDto();


        $rolls = [];
        foreach ($round->getRolls() as $roll) {
            $rolls[] = $this->rollService->transformToObject($roll);
        }

        $roundDto->setRolls($rolls);

        return $roundDto;
    }
}
