<?php

namespace Elly\WorkBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Elly\WorkBundle\Entity\practicas;
use Elly\WorkBundle\Form\practicasType;

/**
 * practicas controller.
 *
 * @Route("/practicas")
 */
class practicasController extends Controller
{

    /**
     * Lists all practicas entities.
     *
     * @Route("/", name="practicascrud")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EllyWorkBundle:practicas')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new practicas entity.
     *
     * @Route("/", name="practicascrud_create")
     * @Method("POST")
     * @Template("EllyWorkBundle:practicas:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new practicas();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('practicascrud_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a practicas entity.
     *
     * @param practicas $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(practicas $entity)
    {
        $form = $this->createForm(new practicasType(), $entity, array(
            'action' => $this->generateUrl('practicascrud_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear'));

        return $form;
    }

    /**
     * Displays a form to create a new practicas entity.
     *
     * @Route("/new", name="practicascrud_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new practicas();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a practicas entity.
     *
     * @Route("/{id}", name="practicascrud_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EllyWorkBundle:practicas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find practicas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing practicas entity.
     *
     * @Route("/{id}/edit", name="practicascrud_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EllyWorkBundle:practicas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find practicas entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a practicas entity.
    *
    * @param practicas $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(practicas $entity)
    {
        $form = $this->createForm(new practicasType(), $entity, array(
            'action' => $this->generateUrl('practicascrud_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Guardar'));

        return $form;
    }
    /**
     * Edits an existing practicas entity.
     *
     * @Route("/{id}", name="practicascrud_update")
     * @Method("PUT")
     * @Template("EllyWorkBundle:practicas:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EllyWorkBundle:practicas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find practicas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('practicascrud_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a practicas entity.
     *
     * @Route("/{id}", name="practicascrud_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EllyWorkBundle:practicas')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find practicas entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('practicascrud'));
    }

    /**
     * Creates a form to delete a practicas entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('practicascrud_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Borrar'))
            ->getForm()
        ;
    }
}
