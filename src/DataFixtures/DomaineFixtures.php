<?php

namespace App\DataFixtures;

use App\Entity\Domaine;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DomaineFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $domaine = new Domaine();
				$domaine->setName('Espace Diamant');
				$domaine->setOpen(1);
				$manager->persist($domaine);
				
        $manager->flush();
    }
}
