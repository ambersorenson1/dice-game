<?php

namespace App\Dto\Incoming;

class EditGameDto
{
private int $gameId;
private string $playerOneScore;
private string $playerTwoScore;
private string $playerTurn;
private int $playerOneId;
private int $playerTwoId;
private array $round = [];

    /**
     * @return array
     */
    public function getRound(): array
    {
        return $this->round;
    }

    /**
     * @param array $round
     */
    public function setRound(array $round): void
    {
        $this->round = $round;
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
    public function getPlayerTurn(): string
    {
        return $this->playerTurn;
    }

    /**
     * @param string $playerTurn
     */
    public function setPlayerTurn(string $playerTurn): void
    {
        $this->playerTurn = $playerTurn;
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