<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class LaMaisonController extends AbstractController
{
/**
* @Route("/lamaison", name="laMaison")
*/
public function laMaison()
    {        
        return $this->render('/LaMaison/laMaison.html.twig');
    } 
}