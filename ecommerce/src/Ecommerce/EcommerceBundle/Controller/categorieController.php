<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Ecommerce\EcommerceBundle\Entity\categorie;
use Ecommerce\EcommerceBundle\Form\categorieType;

/**
 * categorie controller.
 *
 */
class categorieController extends Controller
{

    /**
     * Lists all categorie entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository('EcommerceBundle:categorie')->findAll();

        return $this->render('EcommerceBundle:categorie:index.html.twig', array(
            'categorie' => $categories,
        ));
    }
    /**
     * Creates a new categorie entity.
     *
     */
    public function createAction(Request $request)
    {
        $categorie = new categorie();
        $form = $this->createCreateForm($categorie);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($categorie);
            $em->flush();

            return $this->redirect($this->generateUrl('gestioncategorie_show', array('id' => $categorie->getId())));
        }

        return $this->render('EcommerceBundle:categorie:new.html.twig', array(
            'categorie' => $categorie,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a categorie entity.
     *
     * @param categorie $categorie The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(categorie $categorie)
    {
        $form = $this->createForm(new categorieType(), $categorie, array(
            'action' => $this->generateUrl('gestioncategorie_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new categorie entity.
     *
     */
    public function newAction()
    {
        $categorie = new categorie();
        $form   = $this->createCreateForm($categorie);

        return $this->render('EcommerceBundle:categorie:new.html.twig', array(
            'categorie' => $categorie,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a categorie entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $categorie = $em->getRepository('EcommerceBundle:categorie')->find($id);

        if (!$categorie) {
            throw $this->createNotFoundException('Unable to find categorie entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EcommerceBundle:categorie:show.html.twig', array(
            'categorie'      => $categorie,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing categorie entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $categorie = $em->getRepository('EcommerceBundle:categorie')->find($id);

        if (!$categorie) {
            throw $this->createNotFoundException('Unable to find categorie entity.');
        }

        $editForm = $this->createEditForm($categorie);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EcommerceBundle:categorie:edit.html.twig', array(
            'categorie'      => $categorie,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a categorie entity.
    *
    * @param categorie $categorie The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(categorie $categorie)
    {
        $form = $this->createForm(new categorieType(), $categorie, array(
            'action' => $this->generateUrl('gestioncategorie_update', array('id' => $categorie->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing categorie entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $categorie = $em->getRepository('EcommerceBundle:categorie')->find($id);

        if (!$categorie) {
            throw $this->createNotFoundException('Unable to find categorie entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($categorie);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('gestioncategorie_edit', array('id' => $id)));
        }

        return $this->render('EcommerceBundle:categorie:edit.html.twig', array(
            'categorie'      => $categorie,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a categorie entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $categorie = $em->getRepository('EcommerceBundle:categorie')->find($id);

            if (!$categorie) {
                throw $this->createNotFoundException('Unable to find categorie entity.');
            }

            $em->remove($categorie);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('gestioncategorie'));
    }

    /**
     * Creates a form to delete a categorie entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('gestioncategorie_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
