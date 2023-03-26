<?php

namespace App\DataFixtures;

use App\Entity\Station;
use App\Entity\Trail;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        for ($i = 1; $i <= 5; $i++){
          $station = new Station();
          $station->setName('station n°' . $i);
          $station->setDescription('Ceci est la description de la station n°' . $i . ' qui a pour but de la décrir via des mots qui la décrivent et blablabla');
          $manager->persist($station);
          for ($j = 1; $j <= 15; $j++){
            $trail = new Trail();
            $trail->setName('trail n°' . $j);
            $trail->setLength(rand (100, 1000));
            $colors = ['vert', 'bleue', 'rouge', 'noir'];
            $trail->setDificulty($colors[array_rand($colors)]);
            $date = new DateTimeImmutable('2023-03-26 07:00:00');
            $trail->setOpen($date);
            $date = new DateTimeImmutable('2023-03-26 17:30:00');
            $trail->setClose($date);
            $trail->setStation($station);
            $manager->persist($trail);
          }
        }

        $manager->flush();


    }
}
