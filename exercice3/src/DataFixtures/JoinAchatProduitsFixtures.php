<?php

namespace App\DataFixtures;

use App\Entity\AchatProduits;
use App\Entity\Personne;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class JoinAchatProduitsFixtures extends Fixture implements FixtureInterface, ContainerAwareInterface
{
    private $container;

    public function load(ObjectManager $manager): void
    {
        $em = $this->container->get('doctrine.orm.entity_manager');
        $repPersonne=$em->getRepository(Personne::class);

        $a1 = new AchatProduits();
        $a1->setNom('smartphone Android Pixel');
        $a1->setPrix(458.12);
        $a1->setNombre(1);

        $a2 = new AchatProduits();
        $a2->setNom('ordinateur HP i5');
        $a2->setPrix(1250.50);
        $a2->setNombre(2);

        $a3 = new AchatProduits();
        $a3->setNom('Livre sur Symfony');
        $a3->setPrix(45.90);
        $a3->setNombre(1);

        $a4 = new AchatProduits();
        $a4->setNom('Livre sur PHP');
        $a4->setPrix(35.90);
        $a4->setNombre(1);

        $pers=$repPersonne->findOneBy(array('nom' =>'Macron'));
        $pers->addAchatProduit($a4);
        $manager->persist($pers);

        $pers=$repPersonne->findOneBy(array('nom' =>'Hugo'));
        $pers->addAchatProduit($a1);
        $pers->addAchatProduit($a2);
        $manager->persist($pers);

        $pers=$repPersonne->findOneBy(array('nom' =>'Valjean'));
        $pers->addAchatProduit($a1);
        $pers->addAchatProduit($a3);
        $manager->persist($pers);

        $manager->flush();
    }

    public function setContainer(?ContainerInterface $container)
    {
        $this->container = $container;
    }
}
