<?php

namespace App\Dto\Incoming;

class CreateRoundDto
{
private int $gameId;
private string $playerOneScore;
private string $playerTwoScore;

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
     * @return string
     */
    public function getPlayerOneScore(): string
    {
        return $this->playerOneScore;
    }

    /**
     * @param string $playerOneScore
     */
    public function setPlayerOneScore(string $playerOneScore): void
    {
        $this->playerOneScore = $playerOneScore;
    }

    /**
     * @return string
     */
    public function getPlayerTwoScore(): string
    {
        return $this->playerTwoScore;
    }

    /**
     * @param string $playerTwoScore
     */
    public function setPlayerTwoScore(string $playerTwoScore): void
    {
        $this->playerTwoScore = $playerTwoScore;
    }
}