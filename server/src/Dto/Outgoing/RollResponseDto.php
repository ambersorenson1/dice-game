<?php

namespace App\Dto\Outgoing;


class RollResponseDto
{
    public int $value;
    public int $rollId;
    public int $roundId;
    public int $playerId;

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @param int $value
     */
    public function setValue(int $value): void
    {
        $this->value = $value;
    }

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

    /**
     * @return int
     */
    public function getRoundId(): int
    {
        return $this->roundId;
    }

    /**
     * @param int $roundId
     */
    public function setRoundId(int $roundId): void
    {
        $this->roundId = $roundId;
    }

    /**
     * @return int
     */
    public function getPlayerId(): int
    {
        return $this->playerId;
    }

    /**
     * @param int $playerId
     */
    public function setPlayerId(int $playerId): void
    {
        $this->playerId = $playerId;
    }

}
