<?php


namespace Immobilisation\ImmobilisationBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class AmmortissementsAdmin extends AbstractAdmin
{

    protected function configureRoutes(\Sonata\AdminBundle\Route\RouteCollection $collection)
    {
        $collection
            ->add('calculer', 'calculer/', array('_controller' => 'ImmobilisationBundle:CRUDammo:calculer'))
        ;
    }

    public function getDashboardActions()
    {
        $actions = parent::getDashboardActions();
        unset($actions['create']);
       
        $actions['calculer'] = array(
        'label'=>'calculer',
        'url' => 'calculer/',
        'icon'=>'create');
        return $actions;
    }
    
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            //->add('cumulammortnmoins1')
            ->add('immobilisation')
            ->add('cumulammortn')
            ->add('dotation_ANT')
            ->add('dotation')
            ->add('annee')
            ->add('libelle')
       ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
       $datagridMapper
            //->add('cumulammortnmoins1')
            ->add('immobilisation')
            ->add('cumulammortn')
            ->add('dotation_ANT')
            ->add('dotation')
            ->add('annee')
            ->add('libelle')
       ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            //->add('cumulammortnmoins1')
            ->add('immobilisation')
            ->add('cumulammortn')
            ->add('dotation_ANT')
            ->add('libelle')
            ->add('dotation')
            ->add('annee')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'view' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
          
       ;
    }

    // Fields to be shown on show action
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            //->add('cumulammortnmoins1')
            ->add('immobilisation')
            ->add('libelle')
            ->add('dotation_ANT')
            ->add('baseammort')
            ->add('dotation')
            ->add('annee')
       ;
    }
}
?>