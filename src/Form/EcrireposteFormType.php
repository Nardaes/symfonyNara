<?php

namespace App\Form;

use App\Entity\POSTE;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EcrireposteFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('descriptionPoste')
            ->add('datePoste')
            ->add('statusPoste')
            ->add('nombreReponse')
            ->add('imagePoste')
            ->add('user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => POSTE::class,
        ]);
    }
}
