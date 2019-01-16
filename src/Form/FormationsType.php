<?php

namespace App\Form;

use App\Entity\Formations;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormationsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ecole', null, [
                'label' => 'Ecole/Formation'
            ])
            ->add('anneeDebut', null, [
                'label' => 'Année de début (Année/Mois/Jour) (Minute/Heure)'
            ])
            ->add('anneeFin', null, [
                'label' => 'Année de fin (Année/Mois/Jour) (Minute/Heure) (facultative si non terminée)'
            ])
            ->add('description')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Formations::class,
        ]);
    }
}
