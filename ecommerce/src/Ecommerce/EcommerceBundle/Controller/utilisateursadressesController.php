<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Ecommerce\EcommerceBundle\Entity\utilisateursadresses;
use Ecommerce\EcommerceBundle\Form\utilisateursadressesType;

/**
 * utilisateursadresses controller.
 *
 */
class utilisateursadressesController extends Controller
{

    /**
     * Lists all utilisateursadresses entities.
     *
     */
    public function indexAction()
    {
        $entity = $this->container->get('security.context')->getToken()->getUser();
        $idutilisateur=$entity->getId();
        $em = $this->getDoctrine()->getManager();

        $utilisateur = $em->getRepository('EcommerceBundle:utilisateursadresses')->findBy(array('utilisateur' =>$idutilisateur));

        return $this->render('EcommerceBundle:utilisateursadresses:index.html.twig', array(
            'utilisateur' => $utilisateur,
        ));
    }
    public function afficheradresseAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user=$this->container->get('security.context')->getToken()->getUser();
        //$entities = $em->getRepository('EcommerceBundle:UtilisateursAdresses')->findArray($user);
        /*var_dump($entities);
        die();*/
        return $this->render('EcommerceBundle:UtilisateursAdresses:afficheradresse.html.twig', array(
            'user' => $user,
        ));
    }
      public function supprimeradresseAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('EcommerceBundle:UtilisateursAdresses')->find($id);
        
        if ($this->container->get('security.context')->getToken()->getUser() != $entity->getUtilisateur() || !$entity)
            return $this->redirect ($this->generateUrl ('afficheradresse'));
        
        $em->remove($entity);
        $em->flush();
        
        return $this->redirect ($this->generateUrl ('afficheradresse'));
    }

    public function editadresseAction($id)
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
     public function updateadresseAction(Request $request, $id)
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

            return $this->redirect($this->generateUrl('afficheradresse'));
        }

        return $this->render('EcommerceBundle:Default:afficheradresse.html.twig');
        
    }
     private function createEditForm(utilisateursadresses $entity)
    {
        $form = $this->createForm(new utilisateursadressesType(), $entity, array(
            'action' => $this->generateUrl('modifieradresse_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array(
                                             'attr' => array('class' => 'btn btn-primary'),'label' => 'Modifier'));

        return $form;
    }
    /**
     * Creates a new utilisateursadresses adresse.
     *
     */
    public function createAction(Request $request)
    {
        $adresse = new utilisateursadresses();
        $form = $this->createCreateForm($adresse);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($adresse);
            $em->flush();

            return $this->redirect($this->generateUrl('utilisateursadresses'));
        }

        return $this->render('EcommerceBundle:utilisateursadresses:new.html.twig', array(
            'adresse' => $adresse,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a utilisateursadresses adresse.
     *
     * @param utilisateursadresses $adresse The adresse
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(utilisateursadresses $adresse)
    {
        $form = $this->createForm(new utilisateursadressesType(), $adresse, array(
            'action' => $this->generateUrl('utilisateursadresses_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new utilisateursadresses adresse.
     *
     */
    public function newAction()
    {
        
        $utilisateur = $this->container->get('security.context')->getToken()->getUser();//recuperer l'utilisateur en cours
        $entity = new utilisateursadresses();
        $form = $this->createForm(new utilisateursadressesType(), $entity);
        $form->add('submit', 'submit', array('label' => 'Ajouter'));
        if ($this->get('request')->getMethod() == 'POST')
        {
            $form->handleRequest($this->getRequest());
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $entity->setUtilisateur($utilisateur);
                $em->persist($entity);
                $em->flush();
                return $this->redirect($this->generateUrl('utilisateursadresses'));
            }
        }
        
        return $this->render('EcommerceBundle:utilisateursadresses:new.html.twig', array('utilisateur' => $utilisateur,
                                                                                  'form' => $form->createView()));
    }

    /**
     * Finds and displays a utilisateursadresses adresse.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $adresse = $em->getRepository('EcommerceBundle:utilisateursadresses')->find($id);

        if (!$adresse) {
            throw $this->createNotFoundException('Unable to find utilisateursadresses entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EcommerceBundle:utilisateursadresses:show.html.twig', array(
            'adresse'      => $adresse,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing utilisateursadresses adresse.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $adresse = $em->getRepository('EcommerceBundle:utilisateursadresses')->find($id);

        if (!$adresse) {
            throw $this->createNotFoundException('Unable to find utilisateursadresses entity.');
        }

        $editForm = $this->createEditForm($adresse);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EcommerceBundle:utilisateursadresses:edit.html.twig', array(
            'adresse'      => $adresse,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a utilisateursadresses adresse.
    *
    * @param utilisateursadresses $adresse The adresse
    *
    * @return \Symfony\Component\Form\Form The form
    */
    /*private function createEditForm(utilisateursadresses $adresse)
    {
        $form = $this->createForm(new utilisateursadressesType(), $adresse, array(
            'action' => $this->generateUrl('utilisateursadresses_update', array('id' => $adresse->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }*/
    /**
     * Edits an existing utilisateursadresses adresse.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $adresse = $em->getRepository('EcommerceBundle:utilisateursadresses')->find($id);

        if (!$adresse) {
            throw $this->createNotFoundException('Unable to find utilisateursadresses entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($adresse);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('utilisateursadresses_edit', array('id' => $id)));
        }

        return $this->render('EcommerceBundle:utilisateursadresses:edit.html.twig', array(
            'adresse'      => $adresse,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a utilisateursadresses adresse.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $adresse = $em->getRepository('EcommerceBundle:utilisateursadresses')->find($id);

            if (!$adresse) {
                throw $this->createNotFoundException('Unable to find utilisateursadresses entity.');
            }

            $em->remove($adresse);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('utilisateursadresses'));
    }

    /**
     * Creates a form to delete a utilisateursadresses adresse by id.
     *
     * @param mixed $id The adresse id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('utilisateursadresses_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
