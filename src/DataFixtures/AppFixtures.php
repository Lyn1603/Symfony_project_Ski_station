<?php

namespace App\DataFixtures;


use App\Entity\Pistes;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        for ($i = 1; $i <= 10; $i++) {
            $pistes = new Pistes();
            $pistes->setName('Piste n° ' . $i);
            $pistes->setLength(rand(300, 1000));
            $pistes->setOpenAt(new \DateTime(rand(6,12) . ':' . rand(0,59)));
            $pistes->setCloseAt(new \DateTime(rand(14,24) . ':' . rand(0,59)));
            $manager->persist($pistes);
        }

        $manager->flush();


    }
}
