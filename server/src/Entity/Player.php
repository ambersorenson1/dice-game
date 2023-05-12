<?php

namespace App\Entity;

use App\Repository\PlayerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlayerRepository::class)]
class Player
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\Column]
    private ?int $player_id = null;

    #[ORM\Column(length: 50)]
    private ?string $first_name = null;

    #[ORM\Column(length: 255)]
    private ?string $last_name = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $background_color = null;

    #[ORM\Column(length: 255)]
    private ?string $foreground_color = null;

    #[ORM\ManyToOne(inversedBy: 'Players')]
    #[ORM\JoinColumn(name: 'role_id', referencedColumnName: 'role_id', nullable: false)]
    private ?Role $Role = null;

    #[ORM\ManyToOne(inversedBy: 'Players')]
    #[ORM\JoinColumn(name: 'game_id', referencedColumnName: 'game_id', nullable: false)]
    private ?Game $Game = null;


    /**
     * @return int|null
     */
    public function getPlayerId(): ?int
    {
        return $this->player_id;
    }

    /**
     * @param int|null $player_id
     */
    public function setPlayerId(?int $player_id): void
    {
        $this->player_id = $player_id;
    }

    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    /**
     * @param string|null $first_name
     */
    public function setFirstName(?string $first_name): void
    {
        $this->first_name = $first_name;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    /**
     * @param string|null $last_name
     */
    public function setLastName(?string $last_name): void
    {
        $this->last_name = $last_name;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string|null $password
     */
    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string|null
     */
    public function getBackgroundColor(): ?string
    {
        return $this->background_color;
    }

    /**
     * @param string|null $background_color
     */
    public function setBackgroundColor(?string $background_color): void
    {
        $this->background_color = $background_color;
    }

    /**
     * @return string|null
     */
    public function getForegroundColor(): ?string
    {
        return $this->foreground_color;
    }

    /**
     * @param string|null $foreground_color
     */
    public function setForegroundColor(?string $foreground_color): void
    {
        $this->foreground_color = $foreground_color;
    }

    public function getRole(): ?Role
    {
        return $this->Role;
    }

    public function setRole(?Role $Role): self
    {
        $this->Role = $Role;

        return $this;
    }

    public function getGame(): ?Game
    {
        return $this->Game;
    }

    public function setGame(?Game $Game): self
    {
        $this->Game = $Game;

        return $this;
    }
}
