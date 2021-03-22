<?php
// src/Controller/ChocolaterieController.php
namespace App\Controller;

use App\Entity\Selection;
use App\Form\SelectionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class SelectionController extends AbstractController
{

    /**
    * @Route("", name="home")
    */
    public function affiche()
    {
        return $this->render('home.html.twig');
    }

    /**
    * @Route("", name="home")
    */
    public function show(Request $request)
    {
        // $repository = variable par défaut symfony visant la class voulu
        // get Repository va aller au niveau des données dans la table précisée
        // SELECT query
        $repository = $this->getDoctrine()->getRepository(Selection::class);
        // a ce stade il a accès au données
        // je veux stocker dans la variable $selections TOUT mes selections
        $selections = $repository->findAll();
        //La méthode findAll() retourne toutes les entités. Le format du retour est un simple Array, que vous pouvez parcourir (avec un foreach par exemple) pour utiliser les objets qu'il contient
        // entre guillmet c'est le nom utilisé sur Twig
    return $this->render('home.html.twig', ['selections'=>$selections]);
    }


    ///////////////////// FORMULAIRE AJOUT DE SELECTION DU MOMENT ///////////////////////
    /**
     * @Route("admin/selection/new", name="selection")
     */
    public function new(Request $request)
    {
        $selection = new Selection();
        $form = $this->createForm(SelectionType::class , $selection);

               
       $form->handleRequest($request);

       if ($form->isSubmitted() && $form->isValid()) 
       {
            ////////////////////////////// TEST 2 UPLOAD IMAGE YOUTUBE ROAD TO DEV //////////////////
            $file = $selection->getImg1();
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $file->move($this->getParameter('images_directory'), $fileName);
            $selection->setImg1($fileName);


            $file = $selection->getImg2();
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $file->move($this->getParameter('images_directory'), $fileName);
            $selection->setImg2($fileName);


            $file = $selection->getImg3();
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $file->move($this->getParameter('images_directory'), $fileName);
            $selection->setImg3($fileName);

           // va recup la class dictrine -> va recuperer la class manager de données
           $em = $this->getDoctrine()->getManager();
           // em = objet intancier de la class manager (entity manager)
           // persist() = Cette méthode signale à Doctrine que l'objet doit être enregistré. Elle ne doit être utilisée que pour un nouvel objet et non pas pour une mise à jour.alors jutilise la methode persistante=persist pour rendre ($eleve) persistant 
            $em->persist($selection);
            // flush() = éxécute le SQL dans la base.
            $em->flush();

       }
    
        return $this->render('/selection/newselection.html.twig' , ['formSelection' => $form->createView()]);
    }


    // ////////////////////////////////////// EDITER LA SELECTION ////////////////////////////////

    /**
     * @Route("admin/selection/edit/{id<\d+>}")
     */
    public function edit(Request $request, Selection $selection)
    {
        $form = $this->createForm(SelectionType::class, $selection);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // va effectuer la requête d'UPDATE en base de données
            $file = $selection->getImg1();
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $file->move($this->getParameter('images_directory'), $fileName);
            $selection->setImg1($fileName);


            $file = $selection->getImg2();
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $file->move($this->getParameter('images_directory'), $fileName);
            $selection->setImg2($fileName);


            $file = $selection->getImg3();
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $file->move($this->getParameter('images_directory'), $fileName);
            $selection->setImg3($fileName);
            
            $this->getDoctrine()->getManager()->flush();
        }

        return $this->render('/selection/newselection.html.twig' , ['formSelection' => $form->createView()]);
        //L’instruction $this->render(...) permet d’afficher le formulaire.
    }
    // /**
    // * @Route("/selection/edit")
    // */
    // public function edit(Request $request, Selection $selection)
    // {
    //     $form = $this->createForm(SelectionType::class, $selection);

    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         // va effectuer la requête d'UPDATE en base de données
    //         $this->getDoctrine()->getManager()->flush();
    //     }

    //     return $this->render('/selection/newselection.html.twig' , ['formSelection' => $form->createView()]);
    // }

    // <?php
    // // src/Controller/ChocolaterieController.php
    // namespace App\Controller;
    
    // use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    // use Symfony\Component\Routing\Annotation\Route;
    
    // class AccueilController extends AbstractController
    // {
    // /**
    // * @Route("", name="home")
    // */
    //     public function affiche()
    //     {
    //         return $this->render('home.html.twig');
    //     }
    
    
    // }
    }







































           /////////////// TEST 1 UPLOAD IMAGE DOC SYMFONY ///////////
            // /** @var UploadedFile $image */
            // $image = $form->get('img_1')->getData();
            // if ($image) {
            //     $originalFilename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            //     // this is needed to safely include the file name as part of the URL
            //     $safeFilename = transliterator_transliterate('Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()', $originalFilename);
            //     $newFilename = $safeFilename.'-'.uniqid().'.'.$image->guessExtension();

            //     // Move the file to the directory where brochures are stored
            //     try {
            //         $image->move(
            //             $this->getParameter('images_directory'),
            //             $newFilename
            //         );
            //     } catch (FileException $e) {
            //         // ... handle exception if something happens during file upload
            //     }

            //     // updates the 'brochureFilename' property to store the PDF file name
            //     // instead of its contents
            //     $selection->setImageFileName($newFilename);
            // }








    // /**
    // * @Route("/contact/edit/{id<\d+>}")
    // */
    // public function edit(Request $request, Contact $contact)
    // {
    //     $form = $this->createForm(ContactType::class, $contact);

    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         // va effectuer la requête d'UPDATE en base de données
    //         $this->getDoctrine()->getManager()->flush();
    //     }

    //     return $this->render('contact.html.twig', ['monFormulaire'=>$form->createView()]);
    //     //L’instruction $this->render(...) permet d’afficher le formulaire.
    // }




















    // public function upload()
        
    // {

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $someNewFilename = // pour les page produits > 'product.'.date("Y-m-d H:i:s").'.png'; //le nom que je veux donner (donner un new nom différent pour chasue image)
    //         //nom d'un fichier que je veux upload ex:monfichier1. éxé lors du save

    //         $file = $form['img_1']->getData();
    //         // quand save alors dans file stock le contenu upload (l'image)

    //         $file->move($upl, $someNewFilename);
    //         //déplace le dans le dossier uploadimg
    // //////////////////////////////////////////////////////////////
        

    //         // ...
    //     }

    //     // ...
    //     }
