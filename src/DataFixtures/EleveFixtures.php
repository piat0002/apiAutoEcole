<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Eleve;

class EleveFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        
        $elevesprenom = [
            'Adam',    'Alex',        'Alexandre', 'Alexis',
            'Anthony', 'Antoine',     'Benjamin',  'Cédric',
            'Charles', 'Christopher', 'David',     'Dylan',
            'Édouard', 'Elliot',      'Émile',     'Étienne',
            'Félix',   'Gabriel',     'Guillaume', 'Hugo',
            'Isaac',   'Jacob',       'Jérémy',    'Jonathan',
            'Julien',  'Justin',      'Léo',       'Logan',
            'Loïc',    'Louis',       'Lucas',     'Ludovic',
            'Malik',   'Mathieu,',    'Mathis',    'Maxime',
            'Michaël', 'Nathan',      'Nicolas',   'Noah',
            'Olivier', 'Philippe',    'Raphaël',   'Samuel',
            'Simon',   'Thomas',      'Tommy',     'Tristan',
            'Victor',  'Vincent'
          ];
        $elevesnom = [ 'Smith',       'Murphy',     'Smith',
        'Jones',        "O'Kelly",   'Johnson',    'Williams',
        "O'Sullivan", 'Williams',  'Brown',        'Walsh',
        'Brown',      'Taylor',      'Smith',      'Jones',
        'Davies',       "O'Brien",   'Miller',     'Wilson',
        'Byrne',      'Davis',     'Evans',        "O'Ryan",
        'Garcia',     'Thomas',      "O'Connor",   'Rodriguez',
        'Roberts',      "O'Neill",   'Wilson',     'Smith',
        'Murphy',     'Smith',     'Jones',        "O'Kelly",
        'Johnson',    'Williams',    "O'Sullivan", 'Williams',
        'Brown',        'Walsh',     'Brown',      'Taylor',
        'Smith',      'Jones',     'Davies',       "O'Brien",
        'Miller',     'Wilson',      'Byrne',      'Davis',
        'Evans',        "O'Ryan",    'Garcia',     'Thomas'
        ];
        $listeVilleEtCp = [["Château-Thierry","02400"],["Essomes sur Marne","02400"],["CHARLY-sur-MARNE","02310"],["Paris","75000"],["Reims","51100"],["Nogent-l'Artaud","02310"],["Pavant","02596"]
        ];
        //var_dump($elevesprenom);
        for ($i=0; $i < 50; $i++) { 
            //Generate a timestamp using mt_rand before 1 janvier 2003
            $timestamp = mt_rand(1, 946684800);
            //Format that timestamp into a readable date string.
            $randomDate = new \DateTime();
            $randomDate->setTimestamp($timestamp);
            
            $calculvilleindex = ($i % count($listeVilleEtCp));

            $eleve = new Eleve();
            $eleve->setNom($elevesnom[$i]);
            $eleve->setPrenom($elevesprenom[$i]);
            $eleve->setRue('rue '.$i);
            $eleve->setVille($listeVilleEtCp[$calculvilleindex][0]);
            $eleve->setCp($listeVilleEtCp[$calculvilleindex][1]);
            $eleve->setBirthdate($randomDate);
            $manager->persist($eleve);
        };
        
        $manager->flush();
    }
}
