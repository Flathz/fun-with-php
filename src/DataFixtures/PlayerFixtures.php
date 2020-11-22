<?php

namespace App\DataFixtures;

use App\Entity\Player;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PlayerFixtures extends Fixture
{
    public function load(ObjectManager $manager){
        $playerA = new Player("A");
        $playerB = new Player("B");
        $playerC = new Player("C");
        $playerD = new Player("D");

        $playerA->setPoints("1700");
        $playerB->setPoints("2500");
        $playerC->setPoints("1200");
        $playerD->setPoints("1800");

        $manager->persist($playerA);
        $manager->persist($playerB);
        $manager->persist($playerC);
        $manager->persist($playerD);

        $manager->flush();

    }
}