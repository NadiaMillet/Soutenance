<?php

namespace App\Controller;

use App\Entity\Selection;
use Doctrine\ORM\Query\Expr\Select;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);      
      


    }

    /**
     * @Route("/admin/home", name="admin_home")
     */
    public function home()
    {
        return $this->render('/acceuiladmin/homeadmin.html.twig');
    }
     


    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    // /**
    //  * @Route("/login", name="app_login")
    //  */
    // public function adminAffichage(AuthenticationUtils $authenticationUtils): Response
    // {
    //     $error = $authenticationUtils->getLastAuthenticationError();
    //     $lastUsername = $authenticationUtils->getLastUsername();
    //     if ($this->isGranted('ROLE_ADMIN')) 
    //     {
    //         $repository = $this->getDoctrine()->getRepository(Selection::class);
    //         $selection = $repository->findAll();
    //         return $this->render('security/login.html.twig' , ['last_username' => $lastUsername, 'error' => $error , 'selection'=>$selection]);
    //     }
    // }
}
