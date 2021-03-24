<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AtelierController extends AbstractController
{
/**
* @Route("/atelier", name="atelier")
*/
public function atelier()
{        
    return $this->render('atelier/atelier.html.twig');
} 

}