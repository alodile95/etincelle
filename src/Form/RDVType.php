<?php

namespace App\Form;

use App\Entity\RDV;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RDVType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class,[
                'label'=>'Nom',
                'attr'=>[
                    'placeholder'=>'Veuillez indiquer votre nom.'
                ]
            ])
            ->add('prenom', TextType::class,[
                'label'=>'Prénom',
                'attr'=>[
                    'placeholder'=>'Veuillez indiquer votre prénom.'
                ]
            ])
            ->add('email', EmailType::class,[
                'label'=>'Mon adresse email',
                'attr'=>[
                    'placeholder'=>'Veuillez rentrer votre adresse email.'
                ]
            ])
            ->add('telephone',TelType::class,[
                'label'=>'Mon téléphone',
                'attr'=>[
                    'placeholder'=>'Veuillez rentrer votre numéro de téléphone',
//                    'pattern'=>"[0-9]{10}"
                ]
            ])
            ->add('motif', TextareaType::class,[
                'label'=>'Motif de votre demande de rendez-vous',
                'attr'=>[
                    'placeholder'=>'Veuillez, si vous le voulez, indiquer pour quel motif vous voulez me consulter.'
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Prendre rendez-vous'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RDV::class,
        ]);
    }
}
