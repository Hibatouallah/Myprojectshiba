<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Ecommerce\EcommerceBundle\Entity\marque;
use Ecommerce\EcommerceBundle\Form\marqueType;

/**
 * marque controller.
 *
 */
class marqueController extends Controller
{

    /**
     * Lists all marque entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $marque = $em->getRepository('EcommerceBundle:marque')->findAll();

        return $this->render('EcommerceBundle:marque:index.html.twig', array(
            'marque' => $marque,
        ));
    }
    /**
     * Creates a new marque entity.
     *
     */
    public function createAction(Request $request)
    {
        $marque = new marque();
        $form = $this->createCreateForm($marque);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($marque);
            $em->flush();

            return $this->redirect($this->generateUrl('gestionmarque_show', array('id' => $marque->getId())));
        }

        return $this->render('EcommerceBundle:marque:new.html.twig', array(
            'marque' => $marque,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a marque entity.
     *
     * @param marque $marque The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(marque $marque)
    {
        $form = $this->createForm(new marqueType(), $marque, array(
            'action' => $this->generateUrl('gestionmarque_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new marque entity.
     *
     */
    public function newAction()
    {
        $marque = new marque();
        $form   = $this->createCreateForm($marque);

        return $this->render('EcommerceBundle:marque:new.html.twig', array(
            'marque' => $marque,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a marque entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $marque = $em->getRepository('EcommerceBundle:marque')->find($id);

        if (!$marque) {
            throw $this->createNotFoundException('Unable to find marque entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EcommerceBundle:marque:show.html.twig', array(
            'marque'      => $marque,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing marque entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $marque = $em->getRepository('EcommerceBundle:marque')->find($id);

        if (!$marque) {
            throw $this->createNotFoundException('Unable to find marque entity.');
        }

        $editForm = $this->createEditForm($marque);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EcommerceBundle:marque:edit.html.twig', array(
            'marque'      => $marque,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a marque entity.
    *
    * @param marque $marque The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(marque $marque)
    {
        $form = $this->createForm(new marqueType(), $marque, array(
            'action' => $this->generateUrl('gestionmarque_update', array('id' => $marque->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing marque entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $marque = $em->getRepository('EcommerceBundle:marque')->find($id);

        if (!$marque) {
            throw $this->createNotFoundException('Unable to find marque entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($marque);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('gestionmarque_edit', array('id' => $id)));
        }

        return $this->render('EcommerceBundle:marque:edit.html.twig', array(
            'marque'      => $marque,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a marque entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $marque = $em->getRepository('EcommerceBundle:marque')->find($id);

            if (!$marque) {
                throw $this->createNotFoundException('Unable to find marque entity.');
            }

            $em->remove($marque);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('gestionmarque'));
    }

    /**
     * Creates a form to delete a marque entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('gestionmarque_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
