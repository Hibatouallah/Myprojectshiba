<?php


namespace Immobilisation\ImmobilisationBundle\Admin;

use Immobilisation\ImmobilisationBundle\Repository\ImmobilisationRepository;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;


class ImmobilisationAdmin extends AbstractAdmin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper 
            ->with('Content', array('class' => 'col-md-3'))
            ->add('commande', 'sonata_type_model', array(
            'class' => 'Immobilisation\ImmobilisationBundle\Entity\Commande',
            'property' => 'reference',
             ))
            ->add('utilisateurimmo', 'sonata_type_model', array(
            'class' => 'Immobilisation\ImmobilisationBundle\Entity\utilisateurimmo',
            'property' => 'nom',
             ))
            
            ->add('devision', 'sonata_type_model', array(
            'class' => 'Immobilisation\ImmobilisationBundle\Entity\devision',
            'property' => 'libelle',
             ))
          
            ->add('services', 'sonata_type_model', array(
            'class' => 'Immobilisation\ImmobilisationBundle\Entity\Services',
            'property' => 'libelle',
             ))
           
            ->add('bureau', 'sonata_type_model', array(
            'class' => 'Immobilisation\ImmobilisationBundle\Entity\Bureau',
            'property' => 'libelle',
             ))
          
            ->add('site', 'sonata_type_model', array(
            'class' => 'Immobilisation\ImmobilisationBundle\Entity\Site',
            'property' => 'nom',
             ))
           
            ->add('marque', 'sonata_type_model', array(
            'class' => 'Immobilisation\ImmobilisationBundle\Entity\Marque',
            'property' => 'libelle',
             ))
           
            ->add('sousfamille', 'sonata_type_model', array(
            'class' => 'Immobilisation\ImmobilisationBundle\Entity\Sousfamille',
            'property' => 'libelle',
             ))
            ->end()
            ->with('groupe2', array('class' => 'col-md-9'))
            ->add('TVA', 'sonata_type_model', array(
            'class' => 'Immobilisation\ImmobilisationBundle\Entity\TVA',
            'property' => 'libelle',
             ))
            ->add('description')
            ->add('code')
            ->add('libelle')
            ->add('dureeamort')
            ->add('dateacquisition')
            ->add('datemiseenservice')
            ->add('localisation')
            ->add('codebarre')
            ->add('montantHT')
            ->add('modele')
            ->end()

            ->with('groupe3', array('class' => 'col-md-12'))
            ->add('refdecision')
            ->add('cumulammort')
            ->add('seriecomptable')
            ->add('batiment')
            ->add('etage')
            ->add('numfacture')
            ->add('datefacture')
            ->add('refachat')
            ->add('reforme')
            ->end()

            ->with('groupe4', array('class' => 'col-md-9'))
            ->add('datereforme')
            ->add('datevente')
            ->add('prixcession')
            ->add('naturedepropriete')
            ->add('comptecomptable')
            ->add('idcomptable')
            ->add('Bnome')
            ->add('Bmatr')
            ->add('ServiceMaj')
            ->end()

            ->with('groupe5', array('class' => 'col-md-3'))
            ->add('Zone')
            ->add('codeanalytique')
            ->add('activite')
            ->add('projet')
            ->add('designation')
            ->add('designationsuite')
            ->add('BureauMaj')
            ->add('ZoneMaj')
            ->add('budget')
            ->add('subdivdri')
            ->end()
            // ...
       ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
       $datagridMapper
            ->add('commande')
            ->add('utilisateurimmo')
            ->add('ammortissements')
            ->add('devision')
            ->add('services')
            ->add('bureau')
            ->add('site')
            ->add('marque')
            ->add('sousfamille')
            ->add('description')
            ->add('code')
            ->add('libelle')
            ->add('dureeamort')
            ->add('TVA')
            ->add('dateacquisition')
            //->add('montantacquisition')
            ->add('datemiseenservice')
            ->add('localisation')
            ->add('codebarre')
            ->add('montantHT')
            ->add('montantTTC')
            //->add('montantTVA')
            ->add('modele')
            ->add('refdecision')
            ->add('cumulammort')
            ->add('seriecomptable')
            ->add('batiment')
            ->add('etage')
            ->add('numfacture')
            ->add('datefacture')
            ->add('refachat')
            ->add('reforme')
            ->add('datereforme')
            ->add('datevente')
            ->add('prixcession')
            ->add('naturedepropriete')
            ->add('comptecomptable')
            ->add('idcomptable')
            ->add('Bnome')
            ->add('Bmatr')
            ->add('ServiceMaj')
            ->add('Zone')
            ->add('codeanalytique')
            ->add('activite')
            ->add('projet')
            ->add('designation')
            ->add('designationsuite')
            //->add('annee')
            //->add('BureauMaj')
            ->add('ZoneMaj')
            ->add('budget')
            //->add('Commune')
            //->add('province')
            ->add('subdivdri')
           
       ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('commande')
            ->add('utilisateurimmo')
            ->add('ammortissements')
            ->add('devision')
            ->add('services')
            ->add('bureau')
            ->add('site')
            ->add('marque')
            ->add('sousfamille')
            ->add('description')
            ->add('code')
            ->add('libelle')
            ->add('dureeamort')
            ->add('TVA')
            ->add('dateacquisition')
            //->add('montantacquisition')
            ->add('datemiseenservice')
            ->add('localisation')
            ->add('codebarre')
            ->add('montantHT')
            ->add('montantTTC')
            //->add('montantTVA')
            ->add('modele')
            ->add('refdecision')
            ->add('cumulammort')
            ->add('seriecomptable')
            ->add('batiment')
            ->add('etage')
            ->add('numfacture')
            ->add('datefacture')
            ->add('refachat')
            ->add('reforme')
            ->add('datereforme')
            ->add('datevente')
            ->add('prixcession')
            ->add('naturedepropriete')
            ->add('comptecomptable')
            ->add('idcomptable')
            ->add('Bnome')
            ->add('Bmatr')
            ->add('ServiceMaj')
            ->add('Zone')
            ->add('codeanalytique')
            ->add('activite')
            ->add('projet')
            ->add('designation')
            ->add('designationsuite')
            //->add('annee')
            ->add('BureauMaj')
            ->add('ZoneMaj')
            ->add('budget')
            //->add('Commune')
            //->add('province')
            ->add('subdivdri')
           
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
            ->add('commande')
            ->add('utilisateurimmo')
            ->add('ammortissements')
            ->add('devision')
            ->add('services')
            ->add('bureau')
            ->add('site')
            ->add('marque')
            ->add('sousfamille')
            ->add('description')
            ->add('code')
            ->add('libelle')
            ->add('dureeamort')
            ->add('TVA')
            ->add('dateacquisition')
            //->add('montantacquisition')
            ->add('datemiseenservice')
            ->add('localisation')
            ->add('codebarre')
            ->add('montantHT')
            //->add('montantTTC')
            //->add('montantTVA')
            ->add('modele')
            ->add('refdecision')
            ->add('cumulammort')
            ->add('seriecomptable')
            ->add('batiment')
            ->add('etage')
            ->add('numfacture')
            ->add('datefacture')
            ->add('refachat')
            ->add('reforme')
            ->add('datereforme')
            ->add('datevente')
            ->add('prixcession')
            ->add('naturedepropriete')
            ->add('comptecomptable')
            ->add('idcomptable')
            ->add('Bnome')
            ->add('Bmatr')
            ->add('ServiceMaj')
            ->add('Zone')
            ->add('codeanalytique')
            ->add('activite')
            ->add('projet')
            ->add('designation')
            ->add('designationsuite')
            //->add('annee')
            ->add('BureauMaj')
            ->add('ZoneMaj')
            ->add('budget')
            //->add('Commune')
            //->add('province')
            ->add('subdivdri')
           
       ;
    }
}
?>