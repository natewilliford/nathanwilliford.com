<?php

namespace Nate\PortfolioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Nate\PortfolioBundle\Entity\TechBadge;
use Nate\PortfolioBundle\Form\TechBadgeType;

/**
 * TechBadge controller.
 *
 * @Route("/techbadge")
 */
class TechBadgeController extends Controller
{
    /**
     * Lists all TechBadge entities.
     *
     * @Route("/", name="techbadge")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('NatePortfolioBundle:TechBadge')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a TechBadge entity.
     *
     * @Route("/{id}/show", name="techbadge_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('NatePortfolioBundle:TechBadge')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TechBadge entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to create a new TechBadge entity.
     *
     * @Route("/new", name="techbadge_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new TechBadge();
        $form   = $this->createForm(new TechBadgeType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new TechBadge entity.
     *
     * @Route("/create", name="techbadge_create")
     * @Method("POST")
     * @Template("NatePortfolioBundle:TechBadge:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new TechBadge();
        $form = $this->createForm(new TechBadgeType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('techbadge_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing TechBadge entity.
     *
     * @Route("/{id}/edit", name="techbadge_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('NatePortfolioBundle:TechBadge')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TechBadge entity.');
        }

        $editForm = $this->createForm(new TechBadgeType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing TechBadge entity.
     *
     * @Route("/{id}/update", name="techbadge_update")
     * @Method("POST")
     * @Template("NatePortfolioBundle:TechBadge:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('NatePortfolioBundle:TechBadge')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TechBadge entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new TechBadgeType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('techbadge_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a TechBadge entity.
     *
     * @Route("/{id}/delete", name="techbadge_delete")
     * @Method("POST")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('NatePortfolioBundle:TechBadge')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TechBadge entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('techbadge'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
