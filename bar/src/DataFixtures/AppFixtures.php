<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Beer;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        $beer = new Beer();
        $beer->setname('Super Beer');
        $beer->setPublishedAt(new \DateTime());
        $beer->setDescription('Ergonomic and stylish!');
        $beer->setRating(rand(0, 10));
        $beer->setStatus(rand(0, 1) ? "available" : "unavailable");

        $degrees = [0, 5, 4.5, 8, 9.5];
        $rand_key = array_rand($degrees, 1);

        $beer->setDegree($degrees[$rand_key]);

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        // git add 
        $manager->persist($beer);

        $manager->flush();
    }
}
