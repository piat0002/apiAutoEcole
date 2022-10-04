<?php

namespace App\DataFixtures;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\Note;
use App\Repository\SeanceRepository;
use App\Repository\EleveRepository;



class NoteFixtures extends Fixture implements DependentFixtureInterface
{
    protected $eleveRepository;
    protected $seanceRepository;

    public function __construct(EleveRepository $eleveRepository,SeanceRepository $seanceRepository)
    {
        $this->eleveRepository = $eleveRepository;
        $this->seanceRepository = $seanceRepository;
    }

    public function load(ObjectManager $manager)
    {
        $eleves = $this->eleveRepository->findAll();
        $seances = $this->seanceRepository->findAll();
        for ($i=0; $i < 80; $i++) { 
            $eleveid = ($i % 28) + 1;
            $seanceid = ($i % 9) + 1;
            $note = ($i * 13) % 40;

            $Note = new Note();
            $Note->setNote($note);
            $Note->setSeance($seances[$seanceid]);
            $Note->setEleve($eleves[$eleveid]);
            $manager->persist($Note);
        }
        $manager->flush();
       
    }
    public function getDependencies()
    {
        return [SeanceFixtures::class, EleveFixtures::class,];
    }
}
