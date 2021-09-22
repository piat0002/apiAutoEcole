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

        //generation de note dans ancien seance
        for ($i=0; $i < 20; $i++) { 
            $eleveid = $i;
             //pour les sceance
             for ($j=0; $j < 10; $j++) { 
                $note = ($i * $j + 1) % 40;
                $seanceid = $j;
                $Note = new Note();
                $Note->setNote($note);
                $Note->setSeance($seances[$seanceid]);
                $Note->setEleve($eleves[$eleveid]);
                $manager->persist($Note);
            }
            $manager->persist($Note);
        }

        //generation de note de nouvelle seance
        for ($i=0; $i < 80; $i++) { 
            $eleveid = ($i * 3  % 17);
            $seanceid = ($i % 10)+10;

            $Note = new Note();
            //$Note->setNote($note);
            $Note->setSeance($seances[$seanceid]);
            $Note->setEleve($eleves[$eleveid]);
            $manager->persist($Note);

           
            $manager->persist($Note);
        }

        //generation d'evele qui on reusssi
        for ($i=0; $i < 5 ; $i++) { 
            $eleveid = ($i%5) + 22;
            $note = 36;


            //pour les sceance
            for ($j=0; $j < 5; $j++) { 
                $seanceid = $j;
                $Note = new Note();
                $Note->setNote($note);
                $Note->setSeance($seances[$seanceid]);
                $Note->setEleve($eleves[$eleveid]);
                $manager->persist($Note);
            }
            
        }
        $manager->flush();
       
    }
    public function getDependencies()
    {
        return [SeanceFixtures::class, EleveFixtures::class,];
    }
}
