<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends AbstractController

{  
    private  UserPasswordEncoderInterface $passwordEncoder;
    
      
    public function __construct(UserPasswordEncoderInterface $passwordEncode)
    {
        $this->passwordEncoder = $passwordEncode;
    }
  /**
     * @Route("/login", name="login")
     */
    public function authentification(Request $request,ManagerRegistry $doctrine): JsonResponse 
    {
        $login=$request->query->get('login');
        $password=$request->query->get('pwd');
        $user = new User;
        $user->setUsername($login);
        $user->setPassword($this->passwordEncoder->encodePassword($user,$password));
          //récupération de l'entityManager pour insérer les données en bdd
          $em=$doctrine->getManager();
          $userRepository=$em->getRepository(User::class);
           //requete de selection pour l'onbjet user
         $u=$userRepository->findOneBy(['username' => $login]);
         
         if($u){
            if (! $this->passwordEncoder->isPasswordValid($u, $password)) {
                // invalid password
                $resultat=["NOK pwd invalide"];
            }
            else{
                $resultat=['id_user'=>$u->getId(),'token'=>$u->getApiToken()];
            }
     
         }
            else {
                $resultat=["NOK login invalide"];
            }
   
    $reponse=new JsonResponse($resultat);
    return $reponse;
        

    }
}
