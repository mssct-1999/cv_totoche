<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Projet;

class ProjetFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 10; $i++) {
            $projet = new Projet();
            $projet->setTitre("Projet numéro $i");
            $projet->setDateProjet(new \DateTime());
            $projet->setDescription("Dans le projet numéro $i nous avons fait de grandes et belles choses hyper intéressantes et surtout super mega trop cool");
            $projet->setImage("img/projet");
            $manager->persist($projet);
        }
        $manager->flush();
    }
}
