<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Formations;

class FormationFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        for ($i = 1; $i < 4; $i++) {
            $formation = new Formations();
            $formation->setEcole("Formation numéro $i");
            $formation->setAnneeDebut(new \DateTime());
            $formation->setAnneeFin(new \DateTime());
            $formation->setDescription("<p> Description de la formation numéro $i, j'ai fait plein de truc trop cool bref c'est ouf je sais pas quoi dire tellement cette formation est super méga giga cool");
            $manager->persist($formation);
        }
        $manager->flush();
    }
}
