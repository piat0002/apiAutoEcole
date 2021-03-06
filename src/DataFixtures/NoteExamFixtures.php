<?php

namespace App\DataFixtures;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\NoteExam;
use App\Repository\DateExamRepository;
use App\Repository\EleveRepository;



class NoteExamFixtures extends Fixture
{
    protected $eleveRepository;
    protected $dateExamRepository;

    public function __construct(EleveRepository $eleveRepository,DateExamRepository $dateExamRepository)
    {
        $this->eleveRepository = $eleveRepository;
        $this->dateExamRepository = $dateExamRepository;
    }

    public function load(ObjectManager $manager)
    {
        $eleves = $this->eleveRepository->findAll();
        $dateExams = $this->dateExamRepository->findAll();

        for ($i=0; $i < 40; $i++) { 
            //insertion de note dans les date ancien
            $eleveid = ($i % 28) + 1;
            $dateid = ($i % 5);
            $note = ($i * 13) % 40;

            $NoteExam = new NoteExam();
            $NoteExam->setNote($note);
            $NoteExam->setDateExam($dateExams[$dateid]);
            $NoteExam->setEleve($eleves[$eleveid]);
            $manager->persist($NoteExam);
        }
        for ($i=0; $i < 40; $i++) { 
            //insertion de note dans les dates nouvelles
            $eleveid = ($i % 20)+20;
            $dateid = ($i % 5)+5;
            //$note = ($i * 13) % 40;

            $NoteExam = new NoteExam();
            $NoteExam->setNote($note);
            $NoteExam->setDateExam($dateExams[$dateid]);
            //$NoteExam->setEleve($eleves[$eleveid]);
            $manager->persist($NoteExam);
        }



        $manager->flush();
       
    }
    public function getDependencies()
    {
        return [EleveFixtures::class, DateExamFixtures::class];
    }
}
