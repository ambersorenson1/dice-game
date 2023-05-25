<?php

namespace App\Dto\Outgoing;

class GameResponseDto {
    public int $gameId;
    public int $playerOneId;
    public int $playerTwoId;
    public string $playerOneScore;
    public string $playerTwoScore;
    private array $rounds = [];

    /**
     * @return array
     */
    public function getRounds(): array
    {
        return $this->rounds;
    }

    /**
     * @param array $rounds
     */
    public function setRounds(array $rounds): void
    {
        $this->rounds = $rounds;

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