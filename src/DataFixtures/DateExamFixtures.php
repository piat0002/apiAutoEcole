<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\DateExam;
class DateExamFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i=0; $i <= 0; $i++) { 

            //generation de date passé
            for ($j=0; $j < 5; $j++) {
                $dateactuel = new \DateTime(); 
                $timestamp = mt_rand($dateactuel->getTimestamp()-10000000,  $dateactuel->getTimestamp());
                
                $randomDate = new \DateTime();
                $randomDate->setTimestamp($timestamp);
    
                $dateExam = new DateExam();
                $dateExam->setDate($randomDate);
                $manager->persist($dateExam);
            }



            //generation de date a venir
            for ($j=0; $j < 5; $j++) { 
                $dateactuel = new \DateTime();
                $timestamp = mt_rand($dateactuel->getTimestamp(), $dateactuel->getTimestamp()+10000000);

                
                $randomDate = new \DateTime();
                $randomDate->setTimestamp($timestamp);
    
                $dateExam = new DateExam();
                $dateExam->setDate($randomDate);
                $manager->persist($dateExam);
            }
        }
        $manager->flush();
    }
}
