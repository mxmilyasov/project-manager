<?php


namespace App\Model\User\UseCase\SignUp\Request;

use App\Model\User\Entity\User\User;

class Handler
{
    private $users;
    private $hasher;
    private $flusher;

    public function __construct(UserRepository $users, PasswordHasher $hasher, Flusher $flusher)
    {
        $this->users = $users;
        $this->hasher = $hasher;
        $this->flusher = $flusher;
    }

    public function handle(Command $command): void
    {
        $email = new Email($command->email);

        if ($this->users->hasByEmail($email)) {
            throw new \DomainException('User already exist');
        }

        $user = new User(
            Id::next(),
            new \DateTimeImmutable(),
            $email,
            $this->hasher->hash($command->password)
        );

        $this->users->add($user);
        $this->flusher->flush();
    }
}

//class Handler0
//{
//    private $em;
//
//    public function __construct(EntityManagerInterface $em)
//    {
//        $this->em = $em;
//    }
//
//    public function handle(Command $command): void
//    {
//        $email = mb_strtolower($command->email);
//
//        if ($this->em->getRepository(User::class)->findOneBy(['email' => $email])) {
//            throw new \DomainException('User already exist');
//        }
//
//        $user = new User(
//            Uuid::uuid4()->toString(),
//            new \DateTimeImmutable(),
//            $email,
//            password_hash($command->password, PASSWORD_ARGON2I)
//        );
//
//        $this->em->persist($user);
//        $this->em->flush();
//    }
//}