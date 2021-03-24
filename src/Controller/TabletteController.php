<?php
namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\Produit;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class TabletteController extends AbstractController
{
/**
* samia
* @Route("/tablette",name="tablette" )
*/
public function show()
    {        
        return $this->render('/tablette/show.html.twig');#je veux la route /tablette
    }



/******Afficher les tablettes************************/
    /**
     * @Route("/tablette", name="tablette" )
     */
    public function showtablette(Request $request)
    {
        // get Repository va aller au niveau des données dans la table précisée
        // SELECT query
        $reposcat = $this->getDoctrine()->getRepository(Categorie::class);
        
        $idtablette = $reposcat->findBy(['nom'=>'tablette']);

        $repoprod =$this->getDoctrine()->getRepository(Produit::class);

        $tablettes = $repoprod->findBy(['categorie'=>$idtablette]);

        //AFFICHAGE DE LA PAGE show.html.twig
        // renvoie à show.html.twig 
        // $ c'est utilisé sur le controller
    return $this->render('/tablette/show.html.twig', ['tablettes'=>$tablettes]);
    
    }
}