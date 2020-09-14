<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Ecommerce\EcommerceBundle\Entity\sub_categorie;
use Ecommerce\EcommerceBundle\Form\sub_categorieType;

/**
 * sub_categorie controller.
 *
 */
class sub_categorieController extends Controller
{

    /**
     * Lists all sub_categorie entities.
     *
     */
    public function indexAction($idcategorie)
    {
       // $em = $this->getDoctrine()->getManager();

        //$sub_categories = $em->getRepository('EcommerceBundle:sub_categorie')->find($idcategorie);
         $sub_categories = $this->getDoctrine()->getManager()
        ->getRepository('EcommerceBundle:sub_categorie')
        ->findBy(array('idcategorie' =>$idcategorie));

    
        return $this->render('EcommerceBundle:sub_categorie:index.html.twig', array(
            'sub_categorie' => $sub_categories,
        ));
    }
    /**
     * Creates a new sub_categorie entity.
     *
     */
    public function createAction(Request $request)
    {
        $sub_categorie = new sub_categorie();
        $form = $this->createCreateForm($sub_categorie);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($sub_categorie);
            $em->flush();

            return $this->redirect($this->generateUrl('gestionsubcategorie_show', array('id' => $sub_categorie->getId())));
        }

        return $this->render('EcommerceBundle:sub_categorie:new.html.twig', array(
            'sub_categorie' => $sub_categorie,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a sub_categorie entity.
     *
     * @param sub_categorie $sub_categorie The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(sub_categorie $sub_categorie)
    {
        $form = $this->createForm(new sub_categorieType(), $sub_categorie, array(
            'action' => $this->generateUrl('gestionsubcategorie_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new sub_categorie entity.
     *
     */
    public function newAction()
    {
        $sub_categorie = new sub_categorie();
        $form   = $this->createCreateForm($sub_categorie);

        return $this->render('EcommerceBundle:sub_categorie:new.html.twig', array(
            'sub_categorie' => $sub_categorie,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a sub_categorie entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $sub_categorie = $em->getRepository('EcommerceBundle:sub_categorie')->find($id);

        if (!$sub_categorie) {
            throw $this->createNotFoundException('Unable to find sub_categorie entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EcommerceBundle:sub_categorie:show.html.twig', array(
            'sub_categorie'      => $sub_categorie,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing sub_categorie entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $sub_categorie = $em->getRepository('EcommerceBundle:sub_categorie')->find($id);

        if (!$sub_categorie) {
            throw $this->createNotFoundException('Unable to find sub_categorie entity.');
        }

        $editForm = $this->createEditForm($sub_categorie);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EcommerceBundle:sub_categorie:edit.html.twig', array(
            'sub_categorie'      => $sub_categorie,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a sub_categorie entity.
    *
    * @param sub_categorie $sub_categorie The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(sub_categorie $sub_categorie)
    {
        $form = $this->createForm(new sub_categorieType(), $sub_categorie, array(
            'action' => $this->generateUrl('gestionsubcategorie_update', array('id' => $sub_categorie->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing sub_categorie entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $sub_categorie = $em->getRepository('EcommerceBundle:sub_categorie')->find($id);

        if (!$sub_categorie) {
            throw $this->createNotFoundException('Unable to find sub_categorie entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($sub_categorie);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('gestionsubcategorie_edit', array('id' => $id)));
        }

        return $this->render('EcommerceBundle:sub_categorie:edit.html.twig', array(
            'sub_categorie'      => $sub_categorie,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a sub_categorie entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $sub_categorie = $em->getRepository('EcommerceBundle:sub_categorie')->find($id);

            if (!$sub_categorie) {
                throw $this->createNotFoundException('Unable to find sub_categorie entity.');
            }

            $em->remove($sub_categorie);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('gestionsubcategorie'));
    }

    /**
     * Creates a form to delete a sub_categorie entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('gestionsubcategorie_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
