<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Cd;

class CdFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        
        for ($i=0; $i < 5; $i++) { 
            
            $cd = new Cd();
            $cd->setEditeur('editeur '.$i);
            $cd->setNumero($i);
            $manager->persist($cd);
        };
        
        $manager->flush();
    }
}