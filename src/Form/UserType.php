<?php

namespace App\Form;

use App\Entity\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $isCreation = $options['isCreation'];

        if ($isCreation) {
            $builder->add('email', TextType::class);
        }
        $builder
            // ->add('roles')
            ->add('password', PasswordType::class)
            ->add('username', TextType::class)
            ->add('firstname', TextType::class)
            ->add('lastname', TextType::class)
            ->add('gender', TextType::class)
            ->add(
                'birthday',
                DateType::class,
                [

                    'widget' => 'single_text',
                    'input' => 'datetime_immutable'
                ]
            )
            ->add('address', TextType::class)
            ->add('userImage', UserImageType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'isCreation' => false
        ]);
    }
}
