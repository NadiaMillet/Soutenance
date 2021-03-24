<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



class PatisserieController extends AbstractController
{
/**
* samia
* @Route("/patisserie",name="patisserie" )
*/
public function show()
    {        
        return $this->render('/patisserie/patisserie.html.twig');
    }    


}