<?php

namespace App\Form;

use App\Entity\POSTE;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class EcrireposteFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('descriptionPoste', TextareaType::class, [
                'attr' => ['class' => 'form-control form-control-lg'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please write something',
                    ]),
                    new Length([
                        'max' => 254,
                        'maxMessage' => '{{ limit }} characters is the limit',
                    ]),
                ]
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => POSTE::class,
        ]);
    }
}
