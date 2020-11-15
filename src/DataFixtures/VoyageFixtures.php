<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Voyage;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class VoyageFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 0; $i < 10; $i++) {
            $voyage = new Voyage();
            $voyage->setTitre($faker->sentence);
            $voyage->setDescription($faker->text);
            
            $manager->persist($voyage);
        }

        $manager->flush();
    }
}