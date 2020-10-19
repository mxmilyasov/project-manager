<?php

declare(strict_types=1);

namespace App\Model\User\Entity\User;

class User
{
    private $email;

    private $passwordHash;

    public function __construct(string $email, string $passwordHash)
    {
        $this->email = $email;
        $this->passwordHash = $passwordHash;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPasswordHash(): string
    {
        return $this->passwordHash;
    }



}