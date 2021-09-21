<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Eleve;

class EleveFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        
        $eleves = [];
        
        for ($i=0; $i < 50; $i++) { 
            //Generate a timestamp using mt_rand before 1 janvier 2003
            $timestamp = mt_rand(1, 946684800);
            //Format that timestamp into a readable date string.
            $randomDate = new \DateTime();
            $randomDate->setTimestamp($timestamp);
            
            $eleve = new Eleve();
            $eleve->setNom('name '.$i);
            $eleve->setPrenom('prenom '.$i);
            $eleve->setRue('rue '.$i);
            $eleve->setVille('ville '.$i);
            $eleve->setCp('cp '.$i);
            $eleve->setBirthdate($randomDate);
            $manager->persist($eleve);
        };
        
        $manager->flush();
    }
}
