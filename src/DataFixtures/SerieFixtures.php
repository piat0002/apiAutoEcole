<?php

namespace App\DataFixtures;



use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Serie;

use Doctrine\Common\DataFixtures\DependentFixtureInterface;

use App\Repository\CdRepository;


class SerieFixtures extends Fixture
{

    public function __construct(CdRepository $cdRepository)
    {
        $this->cd = $cdRepository;
    }

    public function load(ObjectManager $manager)
    {
        $cds = $this->cd->findAll();


        for ($i=0; $i <=6 ; $i++) {
            $numero = ($i % 6) + 1;
            for ($j=0; $j < 5; $j++) { 
                $idcd = $j;
                $serie = new Serie();
                $serie->setNumero($numero);
                $serie->setCd($cds[$idcd]);
                $manager->persist($serie);
            }
        }
        $manager->flush();
    }
    public function getDependencies()
    {
        return [CdFixtures::class];
    }

}