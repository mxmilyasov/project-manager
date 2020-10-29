<?php

declare(strict_types=1);

namespace App\Tests\Unit\Model\User\Entity\User\SignUp;

use App\Model\User\Entity\User\Id;
use App\Model\User\Entity\User\Network;
use App\Model\User\Entity\User\User;
use PHPUnit\Framework\TestCase;

class AuthTest extends TestCase
{
    public function testSuccess(): void
    {
        $user = User::signUpByNetwork(
            Id::next(),
            new \DateTimeImmutable(),
            $network = 'vk',
            $identity = '000001'
        );

        self::assertTrue($user->isActive());
        self::assertCount(1, $networks = $user->getNetworks());
        self::assertInstanceOf(Network::class, $first = reset($networks));
        self::assertEquals($network, $first->getNetwork());
        self::assertEquals($identity, $first->getIdentity());
    }

//    public function testAlready(): void
//    {
//        $user = User::signUpByNetwork(
//            $id = Id::next(),
//            $date = new \DateTimeImmutable(),
//            $network = 'vk',
//            $identity = '000001'
//        );
//
//        $this->expectExceptionMessage('User is already signed up.');
//        $user->signUpByNetwork($id, $date, $network, $identity);
//    }
}