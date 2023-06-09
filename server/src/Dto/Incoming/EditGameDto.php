<?php

namespace App\Dto\Incoming;


class EditGameDto
{
    private int $gameId;
    /**
     * @var AddRoundDto[]
     */
    private array $round;

    /**
     * @return AddRoundDto[]
     */
    public function getRounds(): array
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

}

class AddRoundDto
{
    /** @var int[] */
    private array $rolls;
    private int $playerOneScore =0;
    private int $playerTwoScore = 0;

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


