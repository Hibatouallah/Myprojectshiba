<?php

namespace Immobilisation\ImmobilisationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class utilisateurimmoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Immobilisation\ImmobilisationBundle\Entity\utilisateurimmo'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'immobilisation_immobilisationbundle_utilisateurimmo';
    }
}
