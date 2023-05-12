<?php

namespace App\Entity;

use App\Repository\RoundRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoundRepository::class)]
class Round
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\Column]
    private ?int $round_id = null;

    #[ORM\Column]
    private ?int $game_id = null;


    #[ORM\Column(length: 500, nullable: true)]
    private ?string $player_one_score = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $player_two_score = null;

    #[ORM\Column]
    private ?int $roll_id = null;

    #[ORM\ManyToOne(inversedBy: 'Round')]
    #[ORM\JoinColumn(name: 'game_id', referencedColumnName: 'game_id', nullable: false)]
    private ?Game $Games = null;

    #[ORM\OneToMany(mappedBy: 'Round', targetEntity: Roll::class)]
    #[ORM\JoinColumn(name: 'roll_id', referencedColumnName: 'roll_id')]
    private Collection $Rolls;

    public function __construct()
    {
        $this->Rolls = new ArrayCollection();
    }


    /**
     * @return int|null
     */
    public function getRoundId(): ?int
    {
        return $this->round_id;
    }
    public function getGameId(): ?int
    {
        return $this->game_id;
    }

    public function setGameId(int $game_id): self
    {
        $this->game_id = $game_id;

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

    public function getRollId(): ?int
    {
        return $this->roll_id;
    }

    public function setRollId(int $roll_id): self
    {
        $this->roll_id = $roll_id;

        return $this;
    }

    public function getGames(): ?Game
    {
        return $this->Games;
    }

    public function setGames(?Game $Games): self
    {
        $this->Games = $Games;

        return $this;
    }

    /**
     * @return Collection<int, Roll>
     */
    public function getRolls(): Collection
    {
        return $this->Rolls;
    }

    public function addRoll(Roll $roll): self
    {
        if (!$this->Rolls->contains($roll)) {
            $this->Rolls->add($roll);
            $roll->setRound($this);
        }

        return $this;
    }

    public function removeRoll(Roll $roll): self
    {
        if ($this->Rolls->removeElement($roll)) {
            // set the owning side to null (unless already changed)
            if ($roll->getRound() === $this) {
                $roll->setRound(null);
            }
        }

        return $this;
    }

}
