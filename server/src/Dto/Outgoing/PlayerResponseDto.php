<?php

namespace App\Dto\Outgoing;

class  PlayerResponseDto {
    public int $playerId;
    public string $firstName;
    public string $lastName;
    public string $backgroundColor;
    public string $foregroundColor;
    public string $email;
    public string $password;

    public RoleResponseDto $role;


    /**
     * @return int
     */
    public function getPlayerId(): int
    {
        return $this->playerId;
    }

    /**
     * @param int $playerId
     */
    public function setPlayerId(int $playerId): void
    {
        $this->playerId = $playerId;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getBackgroundColor(): string
    {
        return $this->backgroundColor;
    }

    /**
     * @param string $backgroundColor
     */
    public function setBackgroundColor(string $backgroundColor): void
    {
        $this->backgroundColor = $backgroundColor;
    }

    /**
     * @return string
     */
    public function getForegroundColor(): string
    {
        return $this->foregroundColor;
    }

    /**
     * @param string $foregroundColor
     */
    public function setForegroundColor(string $foregroundColor): void
    {
        $this->foregroundColor = $foregroundColor;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return RoleResponseDto
     */
    public function getRole(): RoleResponseDto
    {
        return $this->role;
    }

    /**
     * @param RoleResponseDto $role
     */
    public function setRole(RoleResponseDto $role): void
    {
        $this->role = $role;
    }

}