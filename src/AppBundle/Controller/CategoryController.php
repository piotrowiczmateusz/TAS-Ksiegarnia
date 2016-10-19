<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Book;

class CategoryController extends Controller
{
    /**
     * @Route("/categories/{id}")
     */
    public function indexAction($id)
    {
      $em = $this->getDoctrine()->getManager();

      $query = $em->createQuery("SELECT c FROM AppBundle:Category c WHERE c.id = ".$id);
      $categories = $query->getResult();
      $category = array_pop($categories);

      $query = $em->createQuery("SELECT b FROM AppBundle:Book b WHERE b.category = '".$category->getTitle()."'" );
      $books = $query->getResult();

      return $this->render('default/category.html.twig', array(
        'books' => $books)
      );
      
    }
}
?>
