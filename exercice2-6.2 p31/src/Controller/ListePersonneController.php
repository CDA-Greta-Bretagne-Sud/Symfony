<?php

namespace App\Controller;

use App\Entity\Personne;
use App\Entity\Adresse;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;


class ListePersonneController extends AbstractController
{
    #[Route('/liste', name: 'liste')]
    public function index(ManagerRegistry $doctrine): Response
    {
        // Récupérer le repository de la classe Personne
        $repository = $doctrine->getManager();
        $personnes = $repository->getRepository(Personne::class)->findAll();


        return $this->render('liste_personne/index.html.twig', [
            'listepersonnes' => $personnes,
        ]);
    }
}
