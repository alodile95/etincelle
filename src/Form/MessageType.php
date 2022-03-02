<?php

namespace App\Form;

use App\Entity\Message;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',TextType::class,[
                'label'=>'Prénom et Nom',
                'attr'=>[
                    'placeholder'=>'Veuillez indiquer votre prénom et votre nom.'
                ]
            ])
            ->add('mail', EmailType::class,[
                'label'=>'Mon adresse email',
                'attr'=>[
                    'placeholder'=>'Veuillez rentrer votre adresse email.'
                ]
            ])
            ->add('titre', TextType::class,[
                'label'=>'sujet',
                'attr'=>[
                    'placeholder'=>'Veuillez rentrer le sujet de votre message.'
                ]
            ])
            ->add('corps',TextareaType::class,[
                'label'=>'message',
                'attr'=>[
                    'placeholder'=>'Veuillez écrire votre message.'
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Envoyer le message'
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Message::class,
        ]);
    }
}
