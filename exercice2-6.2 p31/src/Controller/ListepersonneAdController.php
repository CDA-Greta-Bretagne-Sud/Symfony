<?php

namespace App\Controller;

use App\Entity\Personne;
use App\Entity\Adresse;
use App\Entity\Livre;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class ListepersonneAdController extends AbstractController
{

    #[Route('/listepers', name: 'listepers')]
    public function index(ManagerRegistry $doctrine): Response
    { 
        //recuperation du repository grace au manager
        $repository = $doctrine->getManager();  
       
        $listePersonnes = $repository->getRepository(Personne::class)->findAll();

        //transmission de l'arrayCollection à la vue
        return $this->render('listepersonne_ad/index.html.twig', [
            'listepersonnes' => $listePersonnes,
        ]);
    }
}
