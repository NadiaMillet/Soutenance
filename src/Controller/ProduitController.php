<?php

namespace App\Controller;

use App\Entity\Categorie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ProduitType;
use App\Entity\Produit;
use Symfony\Component\HttpFoundation\Response;

class ProduitController extends AbstractController
{
    ////////////// AJOUTER UN NEW PRODUIT //////////////
    /**
     * @Route("/admin/produit/new", name="new_produit")
     */
    public function new(Request $request)
    {
        $produit = new Produit();

        $form = $this->createForm(ProduitType::class , $produit);

               
       $form->handleRequest($request);

       if ($form->isSubmitted() && $form->isValid()) 
       {
            $em = $this->getDoctrine()->getManager();
            // em = objet intancier de la class manager (entity manager)
            // persist() = Cette méthode signale à Doctrine que l'objet doit être enregistré. Elle ne doit être utilisée que pour un nouvel objet et non pas pour une mise à jour.alors jutilise la methode persistante=persist pour rendre ($materiel) persistant 
            $file = $produit->getImage();
            // $file = l'objet récupérer dans le getImage (getter) dans l'entité produit.php
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            // Dans $fileName je donne un nom unique à mon file gâce à la fonction md5(uniqid) + concaténation avec l'extension du fichier récuprérée grâce à guessExtension
            $file->move($this->getParameter('images_directory'), $fileName);
            // appel à la fonction move pour déplacer image dans le dossier indiqué dans les parameters de services.yaml
            $produit->setImage($fileName);
            // setter

            $em->persist($produit);
            
            $em->flush();
            // flush() = éxécute le SQL.
       }
    
        return $this->render('/produit/new.html.twig' , ['formulaire' => $form->createView()]);

    }

    ///////////////////////////////// MODIFIER UN PRODUIT ///////////////////
    /**
     * @Route("/admin/produit/edit/{id<\d+>}", name="edit")
     */
    public function edit(Request $request, Produit $produit)
    {
        $form = $this->createForm(ProduitType::class, $produit);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // va effectuer la requête d'UPDATE en base de données

            // dans file on récupère une donnée grâce au getter de l'image de produit.php
            $file = $produit->getImage();

            // Donner un nom unique -> md5 - hash / uniqid — Génère un identifiant unique / guessExtension - récupère l'extension
            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            // A ce moment $file = l'image récupérée avec un nom unique.extension
            // move = fonction par défaut qui redirigie un fichier->va dans parameters de services.yaml->suit le chemin donné dans images_directory (public/uploads/images)
            $file->move($this->getParameter('images_directory'), $fileName);

            // dans champs image tu l'associes au nom $filename
            $produit->setImage($fileName);

            // éxe requête SQL
            $this->getDoctrine()->getManager()->flush();
        }

        return $this->render('/produit/new.html.twig', ['formulaire'=>$form->createView()]);
        //L’instruction $this->render(...) permet d’afficher le formulaire.
    }

    //////////////////////////////// SUPPRIMER UN PRODUIT ///////////////////////

    /**
     * @Route("/admin/produit/delete/{id<\d+>}", name="delete")
     */
    public function delete(Request $request, Produit $produit)
    {
        $em = $this->getDoctrine()->getManager();
        
        $em->remove($produit);
        $em->flush();

        // redirige la page
        return $this->redirectToRoute("produitlist");
    }

    ////////////////////////////// AFIICHER LA LISTE DES PRODUITS /////////////////////////

    /**
     * @Route("/admin/produit/liste", name="produitlist" )
     */
    public function show(Request $request)
    {
        // $repository = variable par défaut symfony visant la class voulu
        // get Repository va aller au niveau des données dans la table précisée
        // SELECT query
        $repository = $this->getDoctrine()->getRepository(Produit::class);
        // a ce stade il a accès au données
        // je veux stocker dans la variable $produits TOUT mes produits
        $produits = $repository->findAll();
        //La méthode findAll() retourne toutes les entités. Le format du retour est un simple Array, que vous pouvez parcourir (avec un foreach par exemple) pour utiliser les objets qu'il contient
        // entre guillmet c'est le nom utilisé sur Twig
    return $this->render('produit/show.html.twig', ['produits'=>$produits]);
    }

    public function coupage($desc) 
    {
        if (strlen($desc) >= 15) 
        {
            $desc  = trim(substr($desc, 0, 15));
            $desc .= '...';
        }
        return $desc;
    }

    
    ///////////////////////////// AFFICHAGE DETAILS PRODUIT GENERIQUE /////////////////
    /**
     * @Route("/details/{id<\d+>}", name="details" )
     */
    public function details(int $id): Response
    {

        $produits = $this->getDoctrine()
            ->getRepository(Produit::class)
            ->find($id);

    return $this->render('incontournable/details.html.twig', ['produits'=>$produits]);
    }
    
}