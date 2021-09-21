<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\DateExam;
class DateExamFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i=0; $i <= 5; $i++) { 
            $timestamp = mt_rand(1600000000, 1642225938);
            $randomDate = new \DateTime();
            $randomDate->setTimestamp($timestamp);

            $dateExam = new DateExam();
            $dateExam->setDate($randomDate);
            $manager->persist($dateExam);
        }
        $manager->flush();
    }
}
