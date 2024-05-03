<?php

namespace AppBundle\Form;

use AppBundle\Entity\Characteristic;
use AppBundle\Entity\Owner;
use AppBundle\Entity\Vehicle;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VehicleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('brand', TextType::class)
            ->add('model', TextType::class)
            ->add('registrationDate', DateType::class)
            ->add('registrationNumber', TextType::class)
            ->add('owner', EntityType::class, [
                'class' => Owner::class,
                'choice_label' => 'nameOwner', // Remplacez 'nameOwner' par la propriété que vous souhaitez afficher dans la liste déroulante
                'placeholder' => 'Choisir un propriétaire', // Texte par défaut dans la liste déroulante
                // Ajoutez d'autres options si nécessaire
            ])
            ->add('characteristics', EntityType::class, [
                'class' => Characteristic::class,
                'multiple' => true,
                'choice_label' => 'name', // Remplacez 'name' par la propriété que vous souhaitez afficher dans la liste déroulante
                // Ajoutez d'autres options si nécessaire
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Vehicle::class,
        ]);
    }
}