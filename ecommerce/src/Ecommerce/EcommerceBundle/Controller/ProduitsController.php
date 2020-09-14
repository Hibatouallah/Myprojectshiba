<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Ecommerce\EcommerceBundle\Entity\produits;
use Ecommerce\EcommerceBundle\Form\produitsType;
use Symfony\Component\HttpFoundation\Session\Session;
use Ecommerce\EcommerceBundle\Form\RechercheType;
/**
 * produits controller.
 *
 */
class ProduitsController extends Controller
{

    /**
     * Lists all produits entities.
     *
     */
    public function indexAction(Request $request,$sub_categorie)
    {  

          $session = $request->getSession();
        
          $session->set('sub_categorie', $sub_categorie );

          // set and get session attributes
          $session->set('sub_categorie',$sub_categorie);
          $session->get('sub_categorie');

      
          $produits = $this->getDoctrine()->getManager()
        ->getRepository('EcommerceBundle:produits')
        ->findBy(array('sub_categorie' =>$sub_categorie));

         $session2 = $this->getRequest()->getSession();
        if ($session2->has('panier'))
            $panier = $session2->get('panier');
        else
            $panier = false;
        
        
        return $this->render('EcommerceBundle:produits:index.html.twig', array('produit' => $produits,
                                                                                'panier' => $panier));
     
         /*
         $session = new Session();
          $session->start();
    


          $session = $this->getRequest()->getSession();

        {{ app.session.get('foo', 'bar'); }}

        if (!$session->has('sub_categorie')) $session->set('sub_categorie',$sub_categorie);
        $sub_categorie1 = $session->get('sub_categorie');



         $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EcommerceBundle:produits')->findAll();

        return $this->render('EcommerceBundle:produits:index.html.twig', array(
            'entities' => $entities,
        ));*/
    }
     public function produitsbymarqueAction(Request $request,$marque)
    {

            $session = $this->getRequest()->getSession();

            $sub_categorie=$session->get('sub_categorie');

            $em = $this->getDoctrine()->getManager();
            $query = $em->createQuery(
                'SELECT p
                FROM EcommerceBundle:produits p
                WHERE p.marque = :marque AND p.sub_categorie = :sub_categorie '
            )->setParameter('marque',$marque)
            ->setParameter('sub_categorie',$sub_categorie);

                        
            $findproduit=$query->getResult();

             $result = $this->get('knp_paginator');
             $produits=$result->paginate(
                $findproduit,
                $request->query->getInt('page',1),
                $request->query->getInt('limit',6)
            );
     
        return $this->render('EcommerceBundle:produits:produitsbymarque.html.twig', array(
            'produit' => $produits,
        ));

         /*$request = Request::createFromGlobals();
         $subcategorie=$request->query->get('sub_categorie');*/
       
        
         // get the attribute set by another controller in another request
    }
    /**
     * Creates a new produits entity.
     *
     */
    public function createAction(Request $request)
    {
        $produits = new produits();
        $form = $this->createCreateForm($produits);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($produits);
            $em->flush();

            return $this->redirect($this->generateUrl('gestionproduits_show', array('id' => $produits->getId())));
        }

        return $this->render('EcommerceBundle:produits:new.html.twig', array(
            'produit' => $produits,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a produits entity.
     *
     * @param produits $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(produits $produits)
    {
        $form = $this->createForm(new produitsType(), $produits, array(
            'action' => $this->generateUrl('gestionproduits_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new produits entity.
     *
     */
    public function newAction()
    {
        $produits = new produits();
        $form   = $this->createCreateForm($produits);

        return $this->render('EcommerceBundle:produits:new.html.twig', array(
            'entity' => $produits,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a produits entity.
     *
     */
    public function showAction($id)
    {
      $session2 = $this->getRequest()->getSession();
        $em = $this->getDoctrine()->getManager();

        $produits = $em->getRepository('EcommerceBundle:produits')->find($id);

        if (!$produits) {
            throw $this->createNotFoundException('Unable to find produits entity.');
        }

        if ($session2->has('panier'))
            $panier = $session2->get('panier');
        else
            $panier = false;

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EcommerceBundle:produits:show.html.twig', array(
            'produit'      => $produits,
            'panier' => $panier
        ));
    }
     public function show2Action($id)
    {
        $em = $this->getDoctrine()->getManager();

        $produits = $em->getRepository('EcommerceBundle:produits')->find($id);

        if (!$produits) {
            throw $this->createNotFoundException('Unable to find produits entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EcommerceBundle:produits:show.html.twig', array(
            'produit'      => $produits,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing produits entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $produits = $em->getRepository('EcommerceBundle:produits')->find($id);

        if (!$produits) {
            throw $this->createNotFoundException('Unable to find produits entity.');
        }

        $editForm = $this->createEditForm($produits);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EcommerceBundle:produits:edit.html.twig', array(
            'entity'      => $produits,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a produits entity.
    *
    * @param produits $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(produits $produits)
    {
        $form = $this->createForm(new produitsType(), $produits, array(
            'action' => $this->generateUrl('gestionproduits_update', array('id' => $produits->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing produits entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $produits = $em->getRepository('EcommerceBundle:produits')->find($id);

        if (!$produits) {
            throw $this->createNotFoundException('Unable to find produits entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($produits);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('gestionproduits_edit', array('id' => $id)));
        }

        return $this->render('EcommerceBundle:produits:edit.html.twig', array(
            'entity'      => $produits,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a produits entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $produits = $em->getRepository('EcommerceBundle:produits')->find($id);

            if (!$produits) {
                throw $this->createNotFoundException('Unable to find produits entity.');
            }

            $em->remove($produits);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('gestionproduits'));
    }

    /**
     * Creates a form to delete a produits entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('gestionproduits_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
     public function rechercheAction() 
    {
        $form = $this->createForm(new RechercheType());
        return $this->render('EcommerceBundle:produits:recherche.html.twig', array('form' => $form->createView()));
    }
    
    public function rechercheTraitementAction() 
    {
        $form = $this->createForm(new RechercheType());
        
        if ($this->get('request')->getMethod() == 'POST')
        {
            $form->bind($this->get('request'));
            $em = $this->getDoctrine()->getManager();
            $produits = $em->getRepository('EcommerceBundle:produits')->recherche($form['recherche']->getData());
        } else {
            throw $this->createNotFoundException('La page n\'existe pas.');
        }
        
       
        return $this->render('EcommerceBundle:produits:produitsrechercher.html.twig', array('produit' => $produits));
    }
}
