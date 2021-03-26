<?php
// src/Controller/ProduitController.php
namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class CoffretController extends AbstractController
{
      /**
      * @Route("/coffret",name="coffret" )
      */
      public function show()
      {
         return $this->render('/Coffret/coffret.html.twig');
      }

     /**
      * @Route("/coffret",name="coffret" )
      */
     public function showcoffret(Request $request)
     {
         // get Repository va aller au niveau des données dans la table précisée
         // SELECT query
         $reposcat = $this->getDoctrine()->getRepository(Categorie::class);

         $idcoffret = $reposcat->findBy(['nom'=>'coffret']);

         $repoprod = $this->getDoctrine()->getRepository(Produit::class);

         $coffrets = $repoprod->findBy(['categorie'=>$idcoffret]);

         //affichage de la pg coffret.html.twig
         // entre guillement c'est le nom utilisé sur TWIG
         // avec $ c'est utilisé sur le controller
         return $this->render('/Coffret/coffret.html.twig' , ['coffrets'=>$coffrets]);

        
     }
     /**
      * @Route("/coffret",name="descript" )
      */
      public function descript()
      {
         return $this->render('/Coffret/descript.html.twig');
      }

}