<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Ecommerce\EcommerceBundle\Entity\wishlist;

use Ecommerce\EcommerceBundle\Form\wishlistType;

/**
 * wishlist controller.
 *
 */
class wishlistController extends Controller
{

    public function ajouterAction($id)
    {

        $utilisateur=$this->container->get('security.context')->getToken()->getUser();
        $wishlist = new wishlist();
        //$date=$time = date('H:i:s \O\n d/m/Y');
        $produit=$this->getDoctrine()->getRepository('EcommerceBundle:produits')->find($id);
        // On récupère l'EntityManager
        $time = new \DateTime();
        $time->format('H:i:s \O\n Y-m-d');
        $em = $this->getDoctrine()->getManager();
        $wishlist->setProduit($produit);
        $wishlist->setUser($utilisateur);
        $wishlist->setDate($time);

         
        /*var_dump($utilisateur);
        die();*/
        
        // Étape 1 : On « persiste » l'entité
        $em->persist($wishlist);

        // Étape 2 : On « flush » tout ce qui a été persisté avant
        $em->flush();

       return $this->redirect($this->generateUrl('wishlist'));

       
    }
    /**
     * Lists all wishlist entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user=$utilisateur=$this->container->get('security.context')->getToken()->getUser();
        $entities = $em->getRepository('EcommerceBundle:wishlist')->findArray($user);

        /*var_dump($entities);
        die();*/
        return $this->render('EcommerceBundle:wishlist:index.html.twig', array(
            'entity' => $entities,
            
        ));
    }

     public function afficherwishlistAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user=$utilisateur=$this->container->get('security.context')->getToken()->getUser();
        $entities = $em->getRepository('EcommerceBundle:wishlist')->findArray($user);
        /*var_dump($entities);
        die();*/
        return $this->render('EcommerceBundle:wishlist:afficherwishlist.html.twig', array(
            'entity' => $entities,
        ));
    }
    /**
     * Creates a new wishlist entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new wishlist();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('wishlist_show', array('id' => $entity->getId())));
        }

        return $this->render('EcommerceBundle:wishlist:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a wishlist entity.
     *
     * @param wishlist $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(wishlist $entity)
    {
        $form = $this->createForm(new wishlistType(), $entity, array(
            'action' => $this->generateUrl('wishlist_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new wishlist entity.
     *
     */
    public function newAction()
    {
        $entity = new wishlist();
        $form   = $this->createCreateForm($entity);

        return $this->render('EcommerceBundle:wishlist:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a wishlist entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EcommerceBundle:wishlist')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find wishlist entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EcommerceBundle:wishlist:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing wishlist entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EcommerceBundle:wishlist')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find wishlist entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EcommerceBundle:wishlist:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a wishlist entity.
    *
    * @param wishlist $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(wishlist $entity)
    {
        $form = $this->createForm(new wishlistType(), $entity, array(
            'action' => $this->generateUrl('wishlist_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing wishlist entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EcommerceBundle:wishlist')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find wishlist entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('wishlist_edit', array('id' => $id)));
        }

        return $this->render('EcommerceBundle:wishlist:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a wishlist entity.
     *
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        //$entity = $em->getRepository('EcommerceBundle:wishlist')->deleteArticle($id);
        /*$qb = $em->createQueryBuilder();
            $qb->delete('wishlist', 'w');
            $qb->where('w.id = :id');
            $qb->setParameter('id', $id);*/

         $q = $em->createQuery('delete from EcommerceBundle:wishlist tb where tb.id = '.$id);
         $numDeleted = $q->execute();
        return $this->redirect($this->generateUrl('wishlist'));
    }
   

    /**
     * Creates a form to delete a wishlist entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('wishlist_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
