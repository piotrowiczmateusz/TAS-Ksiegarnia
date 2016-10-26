<?php

namespace AppBundle\Controller\API;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use AppBundle\Entity\BookOrder;

class OrdersController extends FOSRestController
{

  /**
  * @Rest\Get("/api/orders")
  */
  public function getOrders(Request $request)
  {
    $em = $this->getDoctrine()->getManager();

    $query = $em->createQuery("SELECT o FROM AppBundle:BookOrder o");
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

    $query = $em->createQuery("SELECT o FROM AppBundle:BookOrder o WHERE o.id = '".$id."'");
    $data = $query->getResult();

      $view = $this->view($data, Response::HTTP_INTERNAL_SERVER_ERROR);
     return $view;
  }

  /**
  * @Rest\Post("/api/orders")
  */
  public function postOrder(Request $request)
  {

    $em = $this->getDoctrine()->getManager();

    $body = $request->getContent();

    if (!empty($body)) { $params = json_decode($body, false); }

    $userId = $params->user_id;
    $bookId = $params->book_id;
    $orderDate = new \DateTime();
    $orderType = $params->order_type;

    $bookOrder = new BookOrder($userId, $bookId, $orderDate, $orderType);

    $em = $this->getDoctrine()->getManager();
    $em->persist($bookOrder);
    $em->flush();

    $params = json_decode($body, true);

    $view = $this->view($params, Response::HTTP_INTERNAL_SERVER_ERROR);
    return $view;
  }

}
