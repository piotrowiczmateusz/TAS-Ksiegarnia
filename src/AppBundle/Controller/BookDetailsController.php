<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

class BookDetailsController extends Controller
{
    /**
     * @Route("/books/{id}")
     */
    public function indexAction(Request $request, $id)
    {
      $session = $request->getSession();

      $em = $this->getDoctrine()->getManager();

      $books = $em->getRepository('AppBundle:Book')->findById($id);
      $categories = $em->getRepository('AppBundle:Category')->findAll(array(), array('title' => 'asc'));

      return $this->render('default/book-details.html.twig', array(
        'name' => $session->get('name'),
        'categories' => $categories,
        'books' => $books)
      );

    }
}
?>
