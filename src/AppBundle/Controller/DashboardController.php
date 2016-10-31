<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

class DashboardController extends Controller
{
    /**
     * @Route("/dashboard")
     */
    public function indexAction(Request $request)
    {
        $session = $request->getSession();

        $em = $this->getDoctrine()->getManager();

        $bestsellers = $em->getRepository('AppBundle:Book')->findByIsBestseller(true);
        $novelties = $em->getRepository('AppBundle:Book')->findByIsNew(true);
        $categories = $em->getRepository('AppBundle:Category')->findAll();

        return $this->render('default/dashboard.html.twig', array(
          'name' => $session->get('name'),
          'bestsellers' => $bestsellers,
          'novelties' => $novelties,
          'categories' => $categories)
        );

    }
}
?>
