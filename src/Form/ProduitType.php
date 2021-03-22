<?php 
// src/Form/ProduitForm.php
// Création de formulaire, les lignes de codes ci-dessous sont par défaut et à reprendre à chaque fois. Ce sont les ->add qui sont à adapter à notre BDD
namespace App\Form;

use App\Entity\Produit;
use App\Entity\Categorie;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class)
            ->add('prix', NumberType::class)
            ->add('description', TextareaType::class)
            ->add('image', FileType::class, array('data_class' => null))
            ->add('poids', NumberType::class, ['required' => false])
            ->add('pieces', NumberType::class, ['required' => false])
            ->add('categorie', EntityType::class, ['class' => Categorie::class, 'choice_label' => 'nom'])             
            ->add('save', SubmitType::class,
            [
                'attr' => ['class' => 'save'],
            ]);
            
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}