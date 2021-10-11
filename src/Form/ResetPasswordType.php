<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class ResetPasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

        ->add('oldPassword', PasswordType::class, array(

            'mapped' => false

        ))

        ->add('newPassword', RepeatedType::class, array(

            'type' => PasswordType::class,

            'invalid_message' => 'Les deux mots de passe doivent être identiques',

            'options' => array(

                'attr' => array(

                    'class' => 'password-field'

                )

            ),
            'mapped' => false,

            'required' => true,

        ))

        ->add('submit', SubmitType::class, array(

            'attr' => array(

                'class' => 'btn btn-primary btn-block'

            )

        ))

    ;
    }
}
