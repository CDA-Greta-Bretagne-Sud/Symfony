<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Personne;
use App\Data\ListePersonnes;

class AppPersonneFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        foreach (ListePersonnes::$mesPersonnes as $maPersonne) {
            $dt = new \DateTime('now - 30 years');
            $p = new Personne();
            $p->setNom($maPersonne["nom"]);
            $p->setPrenom($maPersonne["prenom"]);
            $p->setDateNaiss($dt);
            $p->setEmail($maPersonne["email"]);
            $p->setTelephone($maPersonne["telephone"]);
            $p->setLogin($maPersonne["login"]);
            $p->setPwd($maPersonne["pwd"]);
            $manager->persist($p);
        }

        $manager->flush();
    }
}
