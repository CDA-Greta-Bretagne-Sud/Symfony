<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Personne;
use App\Data\ListePersonnes;

class PersonneFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        foreach (ListePersonnes::$mesPersonnes as $maPersonne) {
            $dt = new \DateTime('now - 30 years');
            $p = new Personne();
            $p->setNom($maPersonne["nom"]);
            $p->setPrenom($maPersonne["prenom"]);
            $p->setDateNaiss($dt);
            $manager->persist($p);
        }

        $manager->flush();
    }
}
