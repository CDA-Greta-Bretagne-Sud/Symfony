<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route("/test/{age}/{prenom}/{nom}",name: 'app_test', requirements: ['nom' => '[a-z-A-Z]{2,30}'])]
    public function index(Request $request, int $age, $prenom, $nom): Response
    {
    
        $session=$request->getSession();
        
    
        $session->getFlashBag()->add("message","message informatif!");
        $session->getFlashBag()->add("message","message important!");
        $session->set('statut','primary');

        return $this->render('test/index.html.twig', [
            'controller_name' => 'Test2Controller',
            'nom' => $nom,
            'prenom' => $prenom,
            'age' => $age,
            'bienvenue'=>'<h3>Vous êtes bienvenu sur ce site<h3>',
        ]);
    } 
}

