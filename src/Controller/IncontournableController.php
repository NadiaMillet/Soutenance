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

    // /**
    //  * @Route("/produit/list", name="produitlist" )
    //  */
    // public function details(Request $request, Produit $id)
    // {
    //     $reposcat = $this->getDoctrine()->getRepository(Categorie::class);
        
    //     $idincon = $reposcat->findBy(['nom'=>'incontournable']);
    //     // $repository = variable par défaut symfony visant la class voulu
    //     // get Repository va aller au niveau des données dans la table précisée
    //     // SELECT query
    //     $repository = $this->getDoctrine()->getRepository(Produit::class);
    //     // a ce stade il a accès au données
    //     // je veux stocker dans la variable $produits TOUT mes produits
    //     $produits = $repository->find($id);
    //     //La méthode findAll() retourne toutes les entités. Le format du retour est un simple Array, que vous pouvez parcourir (avec un foreach par exemple) pour utiliser les objets qu'il contient
    //     // entre guillmet c'est le nom utilisé sur Twig
    // return $this->render('incontournable/details.html.twig', ['produits'=>$produits]);
    // }

    
    /**
    * @Route("/lesincontournables/details/{id<\d+>}", name="details")
    */
    public function details()
    {
        // $repository = $this->getDoctrine()->getRepository(Produit::class);
        // $incontournables = $repository->find($productId);
        if (isset($_GET['/lesincontournables/details'])) {
            $id = $_GET['id'];
            $repoprod = $this->getDoctrine()->getRepository(Produit::class);
            $incontournables = $repoprod->find($id);
        }

        return $this->render('incontournable/details.html.twig', ['incontournables'=>$incontournables]);
    }
}