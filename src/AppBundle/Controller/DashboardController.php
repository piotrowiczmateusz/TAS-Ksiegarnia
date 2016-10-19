<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use AppBundle\Entity\User;

class DashboardController extends Controller
{
    /**
     * @Route("/dashboard")
     */
    public function indexAction(Request $request)
    {
        $session = $request->getSession();

        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery("SELECT b FROM AppBundle:Book b WHERE b.isBestseller = 1");
        $bestsellers = $query->getResult();

        $query = $em->createQuery("SELECT b FROM AppBundle:Book b WHERE b.isNew = 1");
        $novelties = $query->getResult();

        $query = $em->createQuery("SELECT c FROM AppBundle:Category c");
        $categories = $query->getResult();

        return $this->render('default/dashboard.html.twig', array(
          'name' => $session->get('name'),
          'bestsellers' => $bestsellers,
          'novelties' => $novelties,
          'categories' => $categories)
        );

    }
}
?>
