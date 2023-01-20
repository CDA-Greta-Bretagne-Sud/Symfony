<?php

namespace App\Controller;

use App\Entity\Personne;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListePersonneAdController extends AbstractController
{
    #[Route('/liste_personne', name: 'liste_personne')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $manager = $doctrine->getManager();
        $personneRepository = $manager->getRepository(Personne::class);

        $listePersonnes = $personneRepository->findAll();

        return $this->render('liste_personne_ad/index.html.twig', [
            'listePersonnes' => $listePersonnes,
        ]);
    }
}
