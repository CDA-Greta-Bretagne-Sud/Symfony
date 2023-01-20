<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Personne;
use App\Form\PersonneType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class AdminController extends AbstractController
{
    #[Route('/insert', name: 'insert')]
    public function insert(Request $request, ManagerRegistry $doctrine)
    {
        $pers = new Personne();
        $formPersonne = $this->createForm(PersonneType::class, $pers);
        $formPersonne->add('creer', SubmitType::class, array('label' => 'Ajouter une personne'));

        //la méthode handleResquest() permet de récupérer les données del'entité associée
        $formPersonne->handleRequest($request);
        //la méthode isValid() controle que toutes les données du formulairevérifient les contraintes
        if ($request->isMethod('post') && $formPersonne->isValid()) {
            //récupération de l'entityManager pour insérer les données en bdd
            $em = $doctrine->getManager();
            //serailisation de l’entity
            $em->persist($pers);
            //insertion en bdd
            $em->flush();
            //variable message dans la session pour affichage message d’ajout
            $session = $request->getSession();
            //Message flashbag , variable message
            $session->getFlashBag()->add('message', 'une nouvelle personne a été ajoutée');
            //variable statut pour la classe bootstrap
            $session->set('statut', 'success');
            //redirection vers la liste des utilisateurs
            return $this->redirect($this->generateUrl('liste'));
        }
        return $this->render("admin/index.html.twig", array('my_form' => $formPersonne->createView()));
    }
    #[Route('/update/{id}', name: 'update')]
    public function update(Request $request, ManagerRegistry $doctrine, $id)
    {
        $em = $doctrine->getManager();
        $persRepository = $em->getRepository(Personne::class);
        $pers = $persRepository->find($id);
        $formPers = $this->createForm(PersonneType::class, $pers);

        // ajoute un bouton submit
        $formPers->add('creer', SubmitType::class, array('label' => 'Mise à jour de la personne', 'validation_groups' => array('all')));
        $formPers->handleRequest($request);

        if ($request->isMethod('post') && $formPers->isValid()) {
            // update en bdd
            $em->persist($pers);
            $em->flush();
            //session pour flashBag- message information
            $session = $request->getSession();
            $session->getFlashBag()->add('message', 'la personne a été mise à jour');
            $session->set('statut', 'success');
            return $this->redirect($this->generateUrl('liste'));
        }
        return $this->render("admin/index.html.twig", array('my_form' => $formPers->createView()));
    }

    #[Route('/delete/{id}', name: 'delete')]
    public function delete(Request $request, ManagerRegistry $doctrine, $id)
    {
        $em = $doctrine->getManager();
        $persRepository = $em->getRepository(Personne::class);
        $pers = $persRepository->find($id);
        //suppression de l'entity
        $em->remove($pers);
        $em->flush();
        //session pour flashBag- message information
        $session = $request->getSession();
        $session->getFlashBag()->add('message', 'La personne a été supprimée');
        $session->set('statut', 'success');
        return $this->redirect($this->generateUrl('liste'));
    }
}
//Puis il faut créer notre vue admin/create.html.twig :
