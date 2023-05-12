<?php

namespace App\Entity;

use App\Repository\GameRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GameRepository::class)]
class Game
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\Column]
    private ?int $game_id = null;

    #[ORM\Column]
    private ?int $player_one_id = null;

    #[ORM\Column]
    private ?int $player_two_id = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $player_one_score = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $player_two_score = null;


    #[ORM\OneToMany(mappedBy: 'Game', targetEntity: Player::class)]
    #[ORM\JoinColumn(name: 'player_id', referencedColumnName: 'player_id')]
    private Collection $Players;

    #[ORM\OneToMany(mappedBy: 'Games', targetEntity: Round::class)]
    #[ORM\JoinColumn(name: 'round_id', referencedColumnName: 'round_id')]
    private Collection $Round;



    public function __construct()
    {
        $this->Players = new ArrayCollection();
        $this->Round = new ArrayCollection();
    }


    /**
     * @return int|null
     */
    public function getGameId(): ?int
    {
        return $this->game_id;
    }

    public function getPlayerOneId(): ?int
    {
        return $this->player_one_id;
    }

    public function setPlayerOneId(int $player_one_id): self
    {
        $this->player_one_id = $player_one_id;

        return $this;
    }

    public function getPlayerTwoId(): ?int
    {
        return $this->player_two_id;
    }

    public function setPlayerTwoId(int $player_two_id): self
    {
        $this->player_two_id = $player_two_id;

        return $this;
    }

    public function getPlayerOneScore(): ?string
    {
        return $this->player_one_score;
    }

    public function setPlayerOneScore(?string $player_one_score): self
    {
        $this->player_one_score = $player_one_score;

        return $this;
    }

    public function getPlayerTwoScore(): ?string
    {
        return $this->player_two_score;
    }

    public function setPlayerTwoScore(?string $player_two_score): self
    {
        $this->player_two_score = $player_two_score;

        return $this;
    }

    /**
     * @return Collection<int, Player>
     */
    public function getPlayers(): Collection
    {
        return $this->Players;
    }

    public function addPlayer(Player $player): self
    {
        if (!$this->Players->contains($player)) {
            $this->Players->add($player);
            $player->setGame($this);
        }

        return $this;
    }

    public function removePlayer(Player $player): self
    {
        if ($this->Players->removeElement($player)) {
            // set the owning side to null (unless already changed)
            if ($player->getGame() === $this) {
                $player->setGame(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Round>
     */
    public function getRound(): Collection
    {
        return $this->Round;
    }

    public function addRound(Round $round): self
    {
        if (!$this->Round->contains($round)) {
            $this->Round->add($round);
            $round->setGames($this);
        }

        return $this;
    }

    public function removeRound(Round $round): self
    {
        if ($this->Round->removeElement($round)) {
            // set the owning side to null (unless already changed)
            if ($round->getGames() === $this) {
                $round->setGames(null);
            }
        }

        return $this;
    }

}
