<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Data\ListePersonnes;
use App\Entity\Personne;

class PersonnesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        foreach(ListePersonnes::$mesPersonnes as $personne) {
            $dt = new \DateTime('now - 30 years');
            $p = new Personne();
            $p->setNom($personne["nom"]);
            $p->setPrenom($personne["prenom"]);
            $p->setDateNaiss($dt);
            $p->setEmail($personne["email"]);
            
            $manager->persist($p);
        }

        $manager->flush();
    }
}
