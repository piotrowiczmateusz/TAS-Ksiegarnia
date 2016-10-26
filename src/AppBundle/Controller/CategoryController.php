<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Book;

class CategoryController extends Controller
{
    /**
     * @Route("/categories/{id}")
     */
    public function indexAction(Request $request, $id)
    {
      $session = $request->getSession();

      $em = $this->getDoctrine()->getManager();

      $query = $em->createQuery("SELECT c FROM AppBundle:Category c WHERE c.id = '".$id."'");
      $categories = $query->getResult();
      $category = array_pop($categories);

      $query = $em->createQuery("SELECT b FROM AppBundle:Book b WHERE b.category = '".$category->getTitle()."'" );
      $books = $query->getResult();

      $query = $em->createQuery("SELECT c FROM AppBundle:Category c");
      $categories = $query->getResult();

      return $this->render('default/category.html.twig', array(
        'name' => $session->get('name'),
        'category' => $category->getTitle(),
        'categories' => $categories,
        'books' => $books)
      );

    }
}
?>
