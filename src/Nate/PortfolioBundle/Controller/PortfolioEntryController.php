<?php

namespace Nate\PortfolioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Nate\PortfolioBundle\Entity\PortfolioEntry;
use Nate\PortfolioBundle\Form\PortfolioEntryType;

/**
 * PortfolioEntry controller.
 *
 * @Route("/portfolio")
 */
class PortfolioEntryController extends Controller
{
    /**
     * Lists all PortfolioEntry entities.
     *
     * @Route("/", name="portfolio")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('NatePortfolioBundle:PortfolioEntry')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a PortfolioEntry entity.
     *
     * @Route("/{id}/show", name="portfolio_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('NatePortfolioBundle:PortfolioEntry')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PortfolioEntry entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to create a new PortfolioEntry entity.
     *
     * @Route("/new", name="portfolio_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new PortfolioEntry();
        $form   = $this->createForm(new PortfolioEntryType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new PortfolioEntry entity.
     *
     * @Route("/create", name="portfolio_create")
     * @Method("POST")
     * @Template("NatePortfolioBundle:PortfolioEntry:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new PortfolioEntry();
        $form = $this->createForm(new PortfolioEntryType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('portfolio_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing PortfolioEntry entity.
     *
     * @Route("/{id}/edit", name="portfolio_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('NatePortfolioBundle:PortfolioEntry')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PortfolioEntry entity.');
        }

        $editForm = $this->createForm(new PortfolioEntryType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing PortfolioEntry entity.
     *
     * @Route("/{id}/update", name="portfolio_update")
     * @Method("POST")
     * @Template("NatePortfolioBundle:PortfolioEntry:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('NatePortfolioBundle:PortfolioEntry')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PortfolioEntry entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new PortfolioEntryType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('portfolio_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a PortfolioEntry entity.
     *
     * @Route("/{id}/delete", name="portfolio_delete")
     * @Method("POST")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('NatePortfolioBundle:PortfolioEntry')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find PortfolioEntry entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('portfolio'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
