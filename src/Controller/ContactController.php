<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request, \Swift_Mailer $mailer)
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            // on stock dans contact les données récup dans le form
            $contact = $form->getData();

            // envoi du mail
            $message = (new \Swift_Message('Nouveau Contact'))

                // attribuer un expéditeur
                ->setFrom($contact['email'])

                // attribuer un destinataire
                ->setTo('nadiamillet.eb@gmail.com')

                // création du contenu du message avce la vu twig
                ->setBody(
                    $this->renderView('emails/contact.html.twig' , ['contact'=>$contact]),
                    'text/html');

            // envoyer le message
            $mailer->send($message);

            $this->addFlash('message', 'Votre message nous à bien été transmis.');
        
                    
        }
        return $this->render('contact/index.html.twig', [
            'contactForm' => $form->createView()
        ]);
    }
}
