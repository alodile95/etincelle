<?php

namespace App\Form;

use App\Entity\Avis;
use App\Entity\Contexte;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AvisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('pseudo', TextType::class, [
                'label' => 'Pseudo',
                'attr' => [
                    'placeholder' => 'Choisissez un pseudo.'
                ]
            ])
            ->add('email', EmailType::class,[
                'label'=>'Mon adresse email',
                'attr'=>[
                    'placeholder'=>'Veuillez rentrer votre adresse email.'
                ]
            ])
            ->add('contexte', EntityType::class, [
                'label' => 'Vous avez rencontré Yvette Ogier...',
                'required'=>'true',
                'class'=> Contexte::class,
                'multiple'=>false,
                'expanded'=>true
            ])
            ->add('titre', TextType::class, [
                'label' => 'Titre',
                'attr' => [
                    'placeholder' => 'Écrivez un titre à votre avis.'
                ]
            ])
            ->add('corps', TextareaType::class, [
                'label' => 'Avis',
                'attr' => [
                    'placeholder' => 'Écrivez votre avis.'
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Publiez votre avis'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Avis::class,
        ]);
    }
}
