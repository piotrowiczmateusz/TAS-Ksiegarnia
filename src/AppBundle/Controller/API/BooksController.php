<?php

namespace AppBundle\Controller\API;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use AppBundle\Entity\Book;

class BooksController extends FOSRestController
{

  /**
  * @Rest\Get("/api/books")
  */
  public function getBooks(Request $request)
  {
    $em = $this->getDoctrine()->getManager();

    $query = $em->createQuery("SELECT b FROM AppBundle:Book b");
    $data = $query->getResult();

    $view = $this->view($data, Response::HTTP_INTERNAL_SERVER_ERROR);
    return $view;
  }

  /**
  * @Rest\Get("/api/books/{id}")
  */
  public function getBookById(Request $request, $id)
  {
    $em = $this->getDoctrine()->getManager();

    $query = $em->createQuery("SELECT b FROM AppBundle:Book b WHERE b.id = '".$id."'");
    $data = $query->getResult();

      $view = $this->view($data, Response::HTTP_INTERNAL_SERVER_ERROR);
     return $view;
  }

  /**
  * @Rest\Post("/api/books")
  */
  public function postBook(Request $request)
  {

    $em = $this->getDoctrine()->getManager();

    $body = $request->getContent();

    if (!empty($body)) { $params = json_decode($body, false); }

    $title = $params->title;
    $author = $params->author;
    $description = $params->description;
    $category = $params->category;
    $publisher = $params->publisher;
    $date = $params->date;
    $cover = $params->cover;
    $isNew = $params->is_new;
    $isBestseller = $params->is_bestseller;
    $isDiscount = $params->is_discount;
    $price = $params->price;
    $discountPrice = $params->discount_price;
    $rating = $params->rating;

    $book = new Book($title, $author, $description, $category, $publisher, $date, $cover, $isNew,$isBestseller,$isDiscount,$price,$discountPrice,$rating);

    $em = $this->getDoctrine()->getManager();
    $em->persist($book);
    $em->flush();

    $params = json_decode($body, true);

    $view = $this->view($params, Response::HTTP_INTERNAL_SERVER_ERROR);
    return $view;
  }

}
