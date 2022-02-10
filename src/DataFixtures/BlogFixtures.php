<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Blog;

class BlogFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $blog = new Blog();
            $blog->setTitle($faker->sentence(3));

            $manager->persist($blog);
        }

        $manager->flush();
    }
}
