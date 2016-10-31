<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

class CategoryController extends Controller
{
    /**
     * @Route("/categories/{id}")
     */
    public function indexAction(Request $request, $id)
    {
      $session = $request->getSession();

      $em = $this->getDoctrine()->getManager();

      $categories = $em->getRepository('AppBundle:Category')->findAll();
      $category = $em->getRepository('AppBundle:Category')->findOneById($id);
      $books = $em->getRepository('AppBundle:Book')->findByCategory($category->getTitle());

      return $this->render('default/category.html.twig', array(
        'name' => $session->get('name'),
        'category' => $category->getTitle(),
        'categories' => $categories,
        'books' => $books)
      );

    }
}
?>
