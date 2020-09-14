<?php

namespace Immobilisation\ImmobilisationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AmmortissementsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cumulammortnmoins1')
            ->add('cumulammortn')
            ->add('baseammort')
            ->add('dotation')
            ->add('annee')
            ->add('libelle')
            ->add('immobilisation')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Immobilisation\ImmobilisationBundle\Entity\Ammortissements'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'immobilisation_immobilisationbundle_ammortissements';
    }
}
