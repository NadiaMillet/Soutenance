<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class ConditionsGeneralesController extends AbstractController
{
/**
* @Route("/conditionsGenerales", name="conditions_generales")
*/
public function conditionsGeneraleslaMaison()
    {        
        return $this->render('/cgv/conditionsGenerales.html.twig');
    } 
}