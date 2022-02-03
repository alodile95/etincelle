<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChangementMDPType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('pseudo', TextType::class,[
                'disabled'=>true,
                'label'=>'Mon pseudo'
            ])
            ->add('email', EmailType::class,[
                'disabled'=>true,
                'label'=>'Mon adresse email'
            ])
            ->add('old_password', PasswordType::class,[
                'label'=>'Mon mot de passe actuel',
                'mapped'=>false,
                'attr'=>[
                    'placeholder'=>'Veuillez saisir votre mot de passe actuel.'
                ]
            ])
            ->add('new_password', RepeatedType::class, [
                'type' => PasswordType::class,
                'mapped'=>false,
                'invalid_message' => "Le mot de passe et la confirmation doivent être identiques.",
                'label' => "Votre nouveau mot de passe",
                'required' => true,
                'first_options' => ['label' => "Mon nouveau de passe",
                    'attr'=>[
                        'placeholder'=>'Merci de saisir votre nouveau mot de passe'
                    ]],
                'second_options' => ['label' => "Confirmation de votre nouveau mot de passe",
                    'attr'=>[
                        'placeholder'=> 'Merci de confirmer votre nouveau mot de passe'
                    ]]
            ])
            ->add('submit', SubmitType::class, [
                'label' => "Changement du mot de passe"
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
