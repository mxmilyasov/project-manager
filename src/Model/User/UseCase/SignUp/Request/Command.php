<?php


namespace App\Model\User\UseCase\SignUp\Request;

use App\Model\User\Entity\User\Email;

class Command
{
    /**
     * @var Email
     */
    public Email $email;

    /**
     * @var string
     */
    public string $password;
}