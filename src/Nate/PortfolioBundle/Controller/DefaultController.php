<?php

namespace Nate\PortfolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Default controller.
 *
 * @Route("/")
 */
class DefaultController extends Controller {

    /**
     * Lists all PortfolioEntry entities.
     *
     * @Route("", name="home")
     * @Template()
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('NatePortfolioBundle:PortfolioEntry')->findAll();



        return array(
            'entities' => $entities,
            'isAdmin' => $this->get('security.context')->isGranted('ROLE_ADMIN')
        );
    }
}