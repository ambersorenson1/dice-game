<?php

namespace App\Dto\Incoming;

class EditGameDto
{
    private int $gameId;
    private int $playerOneScore;
    private int $playerTwoScore;

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


}