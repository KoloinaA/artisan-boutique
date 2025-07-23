<?php

namespace App\Form;

use App\Entity\Artisan;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            ->add('password')
            ->add('first_name')
            ->add('last_name')
            ->add('address')
            ->add('zip_code')
            ->add('city')
            ->add('phone')
            ->add('created_at')
            ->add('updated_at', null, [
                'widget' => 'single_text'
            ])
            ->add('artisan', EntityType::class, [
                'class' => Artisan::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
