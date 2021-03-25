<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class MentionLegaleController extends AbstractController
{
/**
* @Route("/mentionlegale", name="mention_legale")
*/
public function mentionLegale()
    {        
        return $this->render('/cgv/mentionLegale.html.twig');
    } 
}