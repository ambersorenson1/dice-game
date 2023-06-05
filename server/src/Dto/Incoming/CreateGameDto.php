<?php

namespace App\Dto\Incoming;
class CreateGameDto {
    private int $playerOneId;
    private int $playerTwoId;
    private string $playerOneScore;
    private string $playerTwoScore;
    private string $playerTurnId;

    /**
     * @return string
     */
    public function getPlayerTurnId(): string
    {
        return $this->playerTurnId;
    }

    /**
     * @param string $playerTurnId
     */
    public function setPlayerTurnId(string $playerTurnId): void
    {
        $this->playerTurnId = $playerTurnId;
    }

    /**
     * @return int
     */
    public function getPlayerOneId(): int
    {
        return $this->playerOneId;
    }

    /**
     * @param int $playerOneId
     */
    public function setPlayerOneId(int $playerOneId): void
    {
        $this->playerOneId = $playerOneId;
    }

    /**
     * @return int
     */
    public function getPlayerTwoId(): int
    {
        return $this->playerTwoId;
    }

    /**
     * @param int $playerTwoId
     */
    public function setPlayerTwoId(int $playerTwoId): void
    {
        $this->playerTwoId = $playerTwoId;
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