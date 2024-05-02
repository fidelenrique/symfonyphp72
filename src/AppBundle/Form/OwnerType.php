<?php

namespace AppBundle\Form;

use AppBundle\Entity\Owner;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType; // Importez le bon type de champ

class OwnerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nameOwner', TextType::class) // Utilisez TextType pour un champ de texte
            // Ajoutez d'autres champs ici
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Owner::class,
        ]);
    }
}