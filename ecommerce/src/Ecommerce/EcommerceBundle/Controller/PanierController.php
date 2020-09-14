<?php

namespace Ecommerce\EcommerceBundle\Controller;
use Ecommerce\EcommerceBundle\Form\utilisateursadressesType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ecommerce\EcommerceBundle\Entity\utilisateursadresses;
use Symfony\Component\HttpFoundation\Request;
class PanierController extends Controller
{

	  public function menuAction()
    {
        $session = $this->getRequest()->getSession();
        if (!$session->has('panier'))
            $articles = 0;
        else
            $articles = count($session->get('panier'));
        
        return $this->render('EcommerceBundle:Default:nbarticle.html.twig', array('articles' => $articles));
    }


    public function ajouterAction($id)
    {
         
        $session = $this->getRequest()->getSession();
        
        if (!$session->has('panier')) $session->set('panier',array());
        $panier = $session->get('panier');
        
        if (array_key_exists($id, $panier)) {
            if ($this->getRequest()->query->get('qte') != null) $panier[$id] = $this->getRequest()->query->get('qte');
            $this->get('session')->getFlashBag()->add('success','Quantité modifié avec succès');
        } else {
            if ($this->getRequest()->query->get('qte') != null)
                $panier[$id] = $this->getRequest()->query->get('qte');
            else
                $panier[$id] = 1;
            
            $this->get('session')->getFlashBag()->add('success','Article ajouté avec succès');
        }
            
        $session->set('panier',$panier);
       /* var_dump($panier);
        die();*/
        
        return $this->redirect($this->generateUrl('afficherpanier'));
       

    }
    
    public function panierAction()
    {
        $session = $this->getRequest()->getSession();

        if (!$session->has('panier')) $session->set('panier', array());
        
        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('EcommerceBundle:produits')->findArray(array_keys($session->get('panier')));
        
        return $this->render('EcommerceBundle:Default:cart.html.twig', array('produit' => $produits,
                                                                             'panier' => $session->get('panier')));
    }

      public function supprimerAction($id)
    {
        $session = $this->getRequest()->getSession();
        $panier = $session->get('panier');
        
        if (array_key_exists($id, $panier))
        {
            unset($panier[$id]);
            $session->set('panier',$panier);
            $this->get('session')->getFlashBag()->add('success','Article supprimé avec succès');
        }
        
        return $this->redirect($this->generateUrl('afficherpanier')); 
    }


      public function livraisonAction()
    {
       
        $user = $this->container->get('security.context')->getToken()->getUser();
        $entity = new UtilisateursAdresses();
        $form = $this->createForm(new UtilisateursAdressesType(), $entity);
        
        if ($this->get('request')->getMethod() == 'POST')
        {
            $form->handleRequest($this->getRequest());
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $entity->setUtilisateur($user);
                $em->persist($entity);
                $em->flush();
                
                return $this->redirect($this->generateUrl('livraison'));
            }
        }
        
        return $this->render('EcommerceBundle:Default:livraison.html.twig', array('user' => $user,
                                                                                  'form' => $form->createView()));
                                                                            
    }
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EcommerceBundle:utilisateursadresses')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find utilisateursadresses entity.');
        }

        $editForm = $this->createEditForm($entity);

        return $this->render('EcommerceBundle:utilisateursadresses:edit.html.twig', array(
            'entity'  => $entity,
            'edit_form'   => $editForm->createView(),
        ));
    }
     public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EcommerceBundle:utilisateursadresses')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find utilisateursadresses entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('livraison'));
        }

        return $this->render('EcommerceBundle:Default:livraison.html.twig');
        
    }
     private function createEditForm(utilisateursadresses $entity)
    {
        $form = $this->createForm(new utilisateursadressesType(), $entity, array(
            'action' => $this->generateUrl('gestionutilisateursadresse_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array(
                                             'attr' => array('class' => 'btn btn-primary'),'label' => 'Modifier'));

        return $form;
    }
      public function setadresseOnSession()
    {
        $session = $this->getRequest()->getSession();
        
        if (!$session->has('adresse')) $session->set('adresse',array());
        $adresse = $session->get('adresse');
        
        if ($this->getRequest()->request->get('livraison') != null)
        {
            $adresse['livraison'] = $this->getRequest()->request->get('livraison');
        } else {

            return $this->redirect($this->generateUrl('validation'));
        }
        
        $session->set('adresse',$adresse);
        return $this->redirect($this->generateUrl('validation'));
    }
    
    public function validationAction()
    {
        if ($this->get('request')->getMethod() == 'POST')
            $this->setadresseOnSession();
        
        $em = $this->getDoctrine()->getManager();
        $prepareCommande = $this->forward('EcommerceBundle:Commandes:prepareCommande');
        $commande = $em->getRepository('EcommerceBundle:Commandes')->find($prepareCommande->getContent());

        return $this->render('EcommerceBundle:Default:validation.html.twig', array('commande' => $commande));
    }
     public function adresseSuppressionAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('EcommerceBundle:UtilisateursAdresses')->find($id);
        
        if ($this->container->get('security.context')->getToken()->getUser() != $entity->getUtilisateur() || !$entity)
            return $this->redirect ($this->generateUrl ('livraison'));
        
        $em->remove($entity);
        $em->flush();
        
        return $this->redirect ($this->generateUrl ('livraison'));
    }
    
}
