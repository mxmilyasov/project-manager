<?php


namespace App\Model\User\Entity\User;

use DateTimeImmutable;

class User
{
    private const STATUS_WAIT = 'wait';
    private const STATUS_ACTIVE = 'active';

    /**
     * @var Id
     */
    private Id $id;

    /**
     * @var DateTimeImmutable
     */
    private DateTimeImmutable $date;

    /**
     * @var Email
     */
    private Email $email;

    /**
     * @var string
     */
    private string $passwordHash;

    /**
     * @var string|null
     */
    private string $confirmToken;

    /**
     * @var string
     */
    private string $status;

    public function __construct(Id $id, DateTimeImmutable $date, Email $email, string $hash, string $token)
    {
        $this->id = $id;
        $this->date = $date;
        $this->email = $email;
        $this->passwordHash = $hash;
        $this->confirmToken = $token;
        $this->status = self::STATUS_WAIT;
    }

    public function isWait(): bool
    {
        return $this->status === self::STATUS_WAIT;
    }

    public function isActive(): bool
    {
        return $this->status === self::STATUS_ACTIVE;
    }

    public function getId(): Id
    {
        return $this->id;
    }

    public function getDate(): DateTimeImmutable
    {
        return $this->date;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function getPasswordHash(): string
    {
        return $this->passwordHash;
    }

    public function getConfirmToken(): string
    {
        return $this->confirmToken;
    }
}