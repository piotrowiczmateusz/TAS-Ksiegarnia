<?php

// src/AppBundle/Controller/AddBookController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Book;

class AddBookController extends Controller
{
    /**
     * @Route("/add-book")
     */
    public function addBookAction()
    {
          $title = $_POST['title'];
          $author = $_POST['author'];
          $description = $_POST['description'];
          $category = $_POST['category'];
          $publisher = $_POST['publisher'];
          $date = $_POST['date'];
          (isset($_POST['new'])) ? $isNew = true : $isNew = false;
          (isset($_POST['bestseller'])) ? $isBestseller = true : $isBestseller = false;
          $price = $_POST['price'];

          $book = new Book($title, $author, $description, $category, $publisher, "okladka", $date, $isNew, $isBestseller, $price, "0");

          $em = $this->getDoctrine()->getManager();
          $em->persist($book); // tells Doctrine you want to (eventually) save the Product (no queries yet)
          $em->flush(); // actually executes the queries (i.e. the INSERT query)

          $message = "Dodano ksiązkę: " . $book->getTitle();

          return $this->render('default/alert.html.twig', array('msg' => $message));
        }

    /**
     * @Route("/add-book-form")
     */
    public function addBookFormAction()
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery("SELECT c FROM AppBundle:Category c");
        $categories = $query->getResult();

        return $this->render('default/add-book.html.twig', array(
          'categories' => $categories
        ));
    }

}
?>
