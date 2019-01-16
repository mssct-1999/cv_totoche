<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Competences;

class CompetencesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $competence1 = new Competences();
        $competence1->setNom('Compétences 1');
        $competence1->setValue("50");
        $competence2 = new Competences();
        $competence2->setNom('Compétences 2');
        $competence2->setValue("30");
        $competence3 = new Competences();
        $competence3->setNom('Compétences 3');
        $competence3->setValue("80");
        $manager->persist($competence1);
        $manager->persist($competence2);
        $manager->persist($competence3);
        $manager->flush();
    }
}
