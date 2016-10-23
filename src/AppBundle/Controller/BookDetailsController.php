<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use AppBundle\Entity\Book;

class BookDetailsController extends Controller
{
    /**
     * @Route("/books/{id}")
     */
    public function indexAction(Request $request, $id)
    {
      $session = $request->getSession();

      $em = $this->getDoctrine()->getManager();

      $query = $em->createQuery("SELECT b FROM AppBundle:Book b WHERE b.id = ".$id);
      $books = $query->getResult();

      $query = $em->createQuery("SELECT c FROM AppBundle:Category c");
      $categories = $query->getResult();

      return $this->render('default/book-details.html.twig', array(
        'name' => $session->get('name'),
        'categories' => $categories,
        'books' => $books)
      );

    }
}
?>
