<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Categorie;
use App\Entity\Produit;

class IncontournableController extends AbstractController
{

    /**
    * @Route("/lesincontournables", name="les_incontournables")
    */
    public function show()
    {
        return $this->render('incontournable/incontournable.html.twig');
    }

    //////////////////// AFFICHER DANS LA PAGE LES INCONTOURNABLE 
    /**
     * @Route("/lesincontournables", name="les_incontournables" )
     */
    public function showincontournable(Request $request)
    {
        $reposcat = $this->getDoctrine()->getRepository(Categorie::class);
        
        $idincon = $reposcat->findBy(['nom'=>'incontournable']);

        $repoprod =$this->getDoctrine()->getRepository(Produit::class);

        $incontournables = $repoprod->findBy(['categorie'=>$idincon]);

    return $this->render('incontournable/incontournable.html.twig', ['incontournables'=>$incontournables]);
    
    }
}