<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/test/{age}/{nom}/{prenom}', name: 'app_test', requirements: ['age' => '\d+', 'nom' => '[a-z]{2,30}', 'prenom' => '[a-z]{2,30}'])]
    public function index(Request $request, int $age, string $prenom, string $nom): Response
    {
        $session = $request->getSession();
        $session->getFlashBag()->add("message","message informatif!");
        $session->getFlashBag()->add("message","message important!");
        $session->set('statut','primary');

        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
            'nom' => $nom,
            'prenom' => $prenom,
            'age' => $age,
        ]);
    }
}
