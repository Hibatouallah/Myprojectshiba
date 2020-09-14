<?php


namespace Immobilisation\ImmobilisationBundle\Controller;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
//use Sonata\AdminBundle\Controller\CRUDController as Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\ORM\EntityManager;
use Immobilisation\ImmobilisationBundle\Entity\Immobilisation;
use Immobilisation\ImmobilisationBundle\Entity\Ammortissements;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class CRUDammoController extends Controller
{
    

   public function calculerAction(Request $request)
    { 
      // On initialise notre objet Desk
        $ammort = new Ammortissements();
        // On créé l'objet form à partir du formBuilder (En passant en param l'objet Desk)
        $form = $this->createFormBuilder($ammort)
        ->add('annee', 'number') // On ajoute le champ titre dans un input text
        ->add('submit', 'submit', array('label' => 'Calculer',
                                        'attr'=> array('class' => 'form-control')
                                        ))
        ->getForm(); // On récupère l'objet form


        $form->handleRequest($request); // On bind les valeurs du POST à notre formulaire
        if ($form->isSubmitted() && $form->isValid()) 
        { 
                $annee = $form->getData()->getAnnee();
                
                $em=$this->getDoctrine()->getManager();
                $Immobilisations = $em->getRepository('ImmobilisationBundle:Immobilisation')->findAll();

               foreach ($Immobilisations as $Immobilisation) 
               {
                    $id=$Immobilisation->getId();
                    $em->getConnection()->executeUpdate('CALL calculerammort (?,?)', array($id,$annee));
                    /*echo "<script  type=\"text/javascript\">"
                    . "alert(\" les calculs sont faits avec succés! \");"
                        . "</script>";*/
                         return $this->redirect($this->generateUrl('admin_immobilisation_immobilisation_ammortissements_list'));
                } 

         //$this->get('session')->setFlash('notice',$this->get('translator')->trans('Ammortissements calculés.')) 

        }
        return $this->render('ImmobilisationBundle:CRUD:ammo.html.twig',array(
            'form' => $form->createView()
            ));
    }

    
}
