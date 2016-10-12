<?php

// src/AppBundle/Controller/SignUpController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Book;

class AddBook extends Controller
{
    /**
     * @Route("/add")
     */
    public function indexAction()
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

          return $this->render('default/register.html.twig', array('msg' => $message));
        }

    /**
     * @Route("/add-book")
     */
    public function addBookAction()
    {
        return $this->render('default/add-book.html.twig');
    }

}
?>
