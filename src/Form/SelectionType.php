<?php 
// src/Form/SlectionType.php
// Création de formulaire d'injection de photo et d'un titre par l'admin, dans la section "selection-du-moment" de la page accueil.html.twig
namespace App\Form;

use App\Entity\Selection;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Mime\MimeTypes;
use Symfony\Component\Validator\Constraints\File;



class SelectionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', TextType::class)
            ->add('img1', FileType::class, array('data_class' => null),
            ['label' => 'Ajouter la première image de votre sélection'])
            //, [

            //     // unmapped means that this field is not associated to any entity property
            //     'mapped' => false,

            //     // unmapped fields can't define their validation using annotations
            //     // in the associated entity, so you can use the PHP constraint classes
            //     'constraints' => [
            //         new File(['mimeTypes' => [
            //                 'application/png',
            //                 'application/jpg',
            //             ],
            //             'mimeTypesMessage' => 'Télécharger une image',
            //         ])
            //     ],
            // ])
            ->add('img2', FileType::class,array('data_class' => null),['label' => 'Ajouter la seconde image de votre sélection'])
            ->add('img3', FileType::class,array('data_class' => null),['label' => 'Ajouter la troisième image de votre sélection'])
            ->add('save', SubmitType::class, 
            [
                'attr' => ['class' => 'save'],
            ]);

            
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Selection::class,
        ]);
    }
}
