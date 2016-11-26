<?php

namespace AppBundle\Controller\API;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Category;

class CategoriesController extends FOSRestController
{

  /**
  * @Rest\Get("/api/categories")
  */
  public function getCategories(Request $request)
  {
    $em = $this->getDoctrine()->getManager();

    $query = $em->createQuery("SELECT c FROM AppBundle:Category c");
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

    $query = $em->createQuery("SELECT c FROM AppBundle:Category c WHERE c.id = '".$id."'");
    $data = $query->getResult();

      $view = $this->view($data, Response::HTTP_INTERNAL_SERVER_ERROR);
     return $view;
  }

  /**
  * @Rest\Post("/api/categories")
  */
  public function postCategory(Request $request)
  {

    $em = $this->getDoctrine()->getManager();

    $body = $request->getContent();

    if (!empty($body)) { $params = json_decode($body, false); }

    $title = $params->title;

    $category = new Category($title);

    $em = $this->getDoctrine()->getManager();
    $em->persist($category);
    $em->flush();

    $params = json_decode($body, true);

    $view = $this->view($params, Response::HTTP_INTERNAL_SERVER_ERROR);
    return $view;
  }

}
