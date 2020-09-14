<?php

namespace Immobilisation\ImmobilisationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ImmobilisationType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('description')
            ->add('duree')
            ->add('code')
            ->add('libelle')
            ->add('matricule')
            ->add('dateacquisition')
            ->add('montantacquisition')
            ->add('datemiseenservice')
            ->add('localisation')
            ->add('codebarre')
            ->add('montantHT')
            ->add('montantTTC')
            ->add('modele')
            ->add('montantTVA')
            ->add('numinventaire')
            ->add('cumulammort')
            ->add('numserie')
            ->add('batiment')
            ->add('etage')
            ->add('numfacture')
            ->add('datefacture')
            ->add('commande')
            ->add('utilisateurimmo')
            ->add('ammortissements')
            ->add('devision')
            ->add('services')
            ->add('bureau')
            ->add('site')
            ->add('marque')
            ->add('sousfamille')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Immobilisation\ImmobilisationBundle\Entity\Immobilisation'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'immobilisation_immobilisationbundle_immobilisation';
    }
}
