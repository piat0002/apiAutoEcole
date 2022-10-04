<?php

namespace App\DataFixtures;



use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Seance;

use Doctrine\Common\DataFixtures\DependentFixtureInterface;

use App\Repository\SerieRepository;

class SeanceFixtures extends Fixture implements DependentFixtureInterface
{

    public function __construct(SerieRepository $serieRepository)
    {
        $this->serie = $serieRepository;
    }

    public function load(ObjectManager $manager)
    {

        $series = $this->serie->findAll();

        for ($i=0; $i <= 10; $i++) { 
            $timestamp = mt_rand(1600000000, 1642225938);
            $randomDate = new \DateTime();
            $randomDate->setTimestamp($timestamp);
            $serieId = ($i % 38) + 1;

            $seance = new Seance();
            $seance->setDate($randomDate);
            $seance->setSerie($series[$serieId]);
            $manager->persist($seance);
        }
        $manager->flush();
    }
    public function getDependencies()
    {
        return [SerieFixtures::class];
    }

}
