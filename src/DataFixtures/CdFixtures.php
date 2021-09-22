<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Cd;

class CdFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $nom = ['Tuture La Voiture', 'Rudy', 'Juste In', 'Sam truc', 'Jean Tortue'];
        for ($i=0; $i < 5; $i++) { 
            
            $cd = new Cd();
            $cd->setEditeur($nom[$i]);
            $cd->setNumero($i);
            $manager->persist($cd);
        };
        
        $manager->flush();
    }
}