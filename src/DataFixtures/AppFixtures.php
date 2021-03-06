<?php

namespace App\DataFixtures;

use App\Entity\Ancestry;
use App\Entity\CoreClass;
use App\Entity\Gear;
use App\Entity\Hero;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{

    public function load(ObjectManager $manager): void
    {
        // Generate the CoreClasses

        $className = [
          'Warrior',
          'Assassin',
          'Sorcerer',
          'Mage',
          'Archer',
        ];

        for ($i = 0; $i < 5; $i++) {
            $classHero = new CoreClass();
            $classHero->setName($className[$i]);
            $classHero->setDescription('description' . $i);
            $classHero->setImage('image' . $i);

            $manager->persist($classHero);
        }

        $manager->flush();

        // Get the CoreClasses

        $classesRepo = $manager->getRepository(CoreClass::class);
        $allClasses = $classesRepo->findAll();

        // Generate the Ancestries

        $ancestriesName = [
            'Humain',
            'Elf',
            'Orc',
            'Halfelin',
            'Nain',
        ];

        for ($i = 0; $i < 5; $i++) {
            $ancestry = new Ancestry();
            $ancestry->setName($ancestriesName[$i]);
            $ancestry->setDescription('description' . $i);

            $manager->persist($ancestry);
        }

        $manager->flush();

        // Get the CoreClasses

        $ancestryRepo = $manager->getRepository(Ancestry::class);
        $allAncestries = $ancestryRepo->findAll();

        // Table of names

        $heroesName = [
            'Djall',
            'Jinni',
            'Hecterion',
            'Gabriel',
            'Krizz',
            'Theodric',
            'Bastien',
            'Zraz',
            'Demon',
            'Gevodan',
        ];

        // Generation of 10 heroes

        for ($i = 0; $i < 10; $i++) {
            $randKey = rand(0, count($allClasses) - 1);


            $hero = new Hero();
            $hero->setName($heroesName[$i]);
            $hero->setClass($allClasses[$randKey]);
            $hero->setAncestry($allAncestries[$randKey]);
            $hero->setLevel(rand(0, 10));


            $manager->persist($hero);
        }

        $manager->flush();

        // generation of 10 objects

        $gearsName = [
            'Casque',
            'Torche',
            'Corde',
            'Sac ?? dos',
            'Gourde',
            'Flingue',
            'Fouet',
            'Arc',
            'Couteau',
            'Ep??e',
        ];

        for ($i = 0; $i < 10; $i++) {
            $gear = new Gear();
            $gear->setName($gearsName[$i]);
            $gear->setDescription('description' . $i);

            $manager->persist($gear);
        }

        $manager->flush();
    }
}
