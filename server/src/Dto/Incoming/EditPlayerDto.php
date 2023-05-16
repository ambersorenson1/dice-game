<?php

namespace App\Dto\Incoming;

Class EditPlayerDto extends CreatePlayerDto
{
    public int $player_id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->player_id;
    }

    /**
     * @param int $player_id
     */
    public function setId(int $player_id): void
    {
        $this->player_id = $player_id;
    }
}