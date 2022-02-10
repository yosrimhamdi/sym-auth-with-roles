<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Client;

class ClientFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $client = new Client();
            $client
                ->setName($faker->name())
                ->setEmail($faker->email)
                ->setAge(mt_rand(20, 30));

            $manager->persist($client);
        }

        $manager->flush();
    }
}
