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
        ($session->get('cart')) ? $cart = $session->get('cart') : $cart = array();

        $em = $this->getDoctrine()->getManager();

        $bestsellers = $em->getRepository('AppBundle:Book')->findByIsBestseller(true);
        $novelties = $em->getRepository('AppBundle:Book')->findByIsNew(true);
        $categories = $em->getRepository('AppBundle:Category')->findAll(array(), array('title' => 'asc'));

        $query = $em->createQuery('SELECT b.id, b.title, b.author FROM AppBundle:Book b');
        $books = htmlspecialchars_decode(json_encode($query->getResult()));

        return $this->render('default/dashboard.html.twig', array(
          'name' => $session->get('name'),
          'cart' => $cart,
          'bestsellers' => $bestsellers,
          'novelties' => $novelties,
          'categories' => $categories,
          'books' => $books)
        );

    }
}
?>
