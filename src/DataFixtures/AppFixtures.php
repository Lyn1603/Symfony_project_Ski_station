<?php

namespace App\DataFixtures;

use App\Entity\Pistes;
use App\Entity\Restaurant;
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

            for ($j = 1; $j <= 10; $j++) {
                $restaurant = new Restaurant();
                $restaurant->setName('Restaurant n° ' . $j);
                $restaurant->setDescription('Restaurant n° ' . $j . ' de la piste n° ' . $i);
                $restaurant->setImagePath('/uploads/restaurants/' . $j . '.jpeg');
                $restaurant->setStarVoteCount(rand(10, 100));
                $total_stars = 0;
                for ($k = 1; $k <= $restaurant->getStarVoteCount(); $k++) {
                    $total_stars += rand(1, 5);
                }
                $restaurant->setTotalStars($total_stars);
                $restaurant->setPiste($pistes);
                $manager->persist($restaurant);
            }

            $manager->persist($pistes);
        }

        $manager->flush();
    }
}
