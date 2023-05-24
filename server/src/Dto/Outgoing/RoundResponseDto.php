<?php

namespace App\Dto\Outgoing;


class RoundResponseDto
{
  private int $roundId;
  private array $rolls = [];

    /**
     * @return array
     */
    public function getRolls(): array
    {
        return $this->rolls;
    }

    /**
     * @param RollResponseDto[] $rolls
     */
    public function setRolls(array $rolls): void
    {
        $this->rolls = $rolls;
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
}