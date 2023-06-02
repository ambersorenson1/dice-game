<?php

namespace App\Dto\Outgoing;

class RoundResponseDto
{
    public int $roundId;
    public int $gameId;
    public int $playerOneScore;
    public int $playerTwoScore;

    /** @var RollResponseDto[] */
    public array $rolls = [];

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
    public function getGameId(): int
    {
        return $this->gameId;
    }

    /**
     * @param int $gameId
     */
    public function setGameId(int $gameId): void
    {
        $this->gameId = $gameId;
    }

    /**
     * @return int
     */
    public function getPlayerOneScore(): int
    {
        return $this->playerOneScore;
    }

    /**
     * @param int $playerOneScore
     */
    public function setPlayerOneScore(int $playerOneScore): void
    {
        $this->playerOneScore = $playerOneScore;
    }

    /**
     * @return int
     */
    public function getPlayerTwoScore(): int
    {
        return $this->playerTwoScore;
    }

    /**
     * @param int $playerTwoScore
     */
    public function setPlayerTwoScore(int $playerTwoScore): void
    {
        $this->playerTwoScore = $playerTwoScore;
    }

    /**
     * @return array
     */
    public function getRolls(): array
    {
        return $this->rolls;
    }

    /**
     * @param array $rolls
     */
    public function setRolls(array $rolls): void
    {
        $this->rolls = $rolls;
    }
}