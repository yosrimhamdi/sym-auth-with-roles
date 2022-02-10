<?php

namespace App\DataFixtures;

use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {
        $superAdminUser = new User();
        $superAdminUser
            ->setEmail('admin@admin.com')
            ->setPassword(
                $this->hasher->hashPassword($superAdminUser, 'password')
            )
            ->setRoles(['ROLE_SUPER_ADMIN']);

        $user = new User();
        $user
            ->setEmail('user@user.com')
            ->setPassword(
                $this->hasher->hashPassword($superAdminUser, 'password')
            );

        $manager->persist($user);
        $manager->persist($superAdminUser);

        $manager->flush();
    }
}
