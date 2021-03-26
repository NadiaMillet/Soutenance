<?php

namespace App\Controller;
use App\Entity\Produit;
use App\Entity\Categorie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MacaronController extends AbstractController
{
/**
* @Route("/macaron", name="macaron")
*/
public function macaron()
{        
    return $this->render('macaron/macaron.html.twig');
} 


    /******Afficher les macarons************************/
    /**
     * @Route("/macaron", name="macaron" )
     */
    public function show(Request $request)
    {
        // get Repository va aller au niveau des données dans la table précisée
        // SELECT query
        $reposcat = $this->getDoctrine()->getRepository(Categorie::class);
        //fouiller la table catégorie grace à mon fichier Categorie.php
        $boite = $reposcat->findBy(['nom'=>'macaron']);
        //$boite=id de macaron qui est en fait dans la table l'id 1
        //trouve moi macaron dans la colonne nom "macaron", nom correspondant à la colonne de ma table indiquée à la ligne 29 (catégorie)
        $repoprod =$this->getDoctrine()->getRepository(Produit::class);
        //fouiller la table Produit grace à mon fichier Produit.php
        // on a crée une variable ($boite), dans laquelle je stocke une action. l'action de fouiller dans la table Produit.
        $macarons = $repoprod->findBy(['categorie'=>$boite]);
        //Stocke moi dans la $macarons Produit, maintenant trouve moi dans la colonne produit l'id de macaron
        //On a crée une variable ($macaron) qui stocke $repoprod (=fouiller dans la table produit)+ action de chercher la colonne "categorie"

        //AFFICHAGE DE LA PAGE macarons.html.twig
        // renvoie à macarons.html.twig 
        // $ c'est utilisé sur le controller
    return $this->render('macaron/macaron.html.twig', ['macarons'=>$macarons]);
    
    }

//    /********************route de DESCRIPTION***/   
  // /**
// * @Route("/description", name="descriptionMacaron")
// */
// public function description()
// { return $this->render('macaron/description.html.twig');}
 

}