<?php

namespace App\Dto\Outgoing;

class RollResponseDto
{
    private int $rollId;

    /**
     * @return int
     */
    public function getRollId(): int
    {
        return $this->rollId;
    }

    /**
     * @param int $rollId
     */
    public function setRollId(int $rollId): void
    {
        $this->rollId = $rollId;
    }
}