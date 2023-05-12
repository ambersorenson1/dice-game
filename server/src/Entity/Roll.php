<?php

namespace App\Entity;

use App\Repository\RollRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RollRepository::class)]
class Roll
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\Column]
    private ?int $roll_id = null;

    #[ORM\Column(length: 6, nullable: true)]
    private ?string $value = null;

    #[ORM\ManyToOne(inversedBy: 'Rolls')]
    #[ORM\JoinColumn(name: 'round_id', referencedColumnName: 'round_id', nullable: false)]
    private ?Round $Round = null;

    /**
     * @return int|null
     */
    public function getRollId(): ?int
    {
        return $this->roll_id;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(?string $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getRound(): ?Round
    {
        return $this->Round;
    }

    public function setRound(?Round $Round): self
    {
        $this->Round = $Round;

        return $this;
    }

}
