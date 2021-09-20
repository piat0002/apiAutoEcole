<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EleveFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $eleves = [
            "ok"
        ];
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
