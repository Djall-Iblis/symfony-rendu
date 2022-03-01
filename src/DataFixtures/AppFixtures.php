<?php

namespace App\DataFixtures;

use App\Entity\CoreClass;
use App\Entity\Hero;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    const heroesName = [
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

        // Generation of 10 heros

        for ($i = 0; $i < 10; $i++) {
            $randKey = rand(0, count($allClasses) - 1);


            $hero = new Hero();
            $hero->setName($heroesName[$i]);
            $hero->setClass($allClasses[$randKey]);
            $hero->setLevel(rand(0, 10));

            $manager->persist($hero);
        }




        $manager->flush();
    }
}
