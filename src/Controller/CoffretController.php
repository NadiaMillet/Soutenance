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

//   /**
   //    * @Route("/produit/list", name="produitlist" )
   //    */
   //   public function details(Request $request, Produit $id)
   //   {
   //     $reposcat = $this->getDoctrine()->getRepository(Categorie::class);
        
   //     $idcoffret = $reposcat->findBy(['nom'=>'coffret']);
   //  //     // $repository = variable par défaut symfony visant la class voulu
   //  //     // get Repository va aller au niveau des données dans la table précisée
   //  //     // SELECT query
   //     $repository = $this->getDoctrine()->getRepository(Produit::class);
   //  //     // a ce stade il a accès au données
   //  //     // je veux stocker dans la variable $produits TOUT mes produits
   //     $produits = $repository->find($idcoffret);
   //  //     //La méthode findAll() retourne toutes les entités. Le format du retour est un simple Array, que vous pouvez parcourir (avec un foreach par exemple) pour utiliser les objets qu'il contient
   //  //     // entre guillmet c'est le nom utilisé sur Twig
   //      return $this->render('Coffret/descript.html.twig', ['produits'=>$produits]);
   //  }
   

}