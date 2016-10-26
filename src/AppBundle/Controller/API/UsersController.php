<?php

namespace AppBundle\Controller\API;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use AppBundle\Entity\User;

class UsersController extends FOSRestController
{

  /**
  * @Rest\Get("/api/users")
  */
  public function getUsers(Request $request)
  {
    $em = $this->getDoctrine()->getManager();

    $query = $em->createQuery("SELECT u FROM AppBundle:User u");
    $data = $query->getResult();

    $view = $this->view($data, Response::HTTP_INTERNAL_SERVER_ERROR);
    return $view;
  }

  /**
  * @Rest\Get("/api/users/{id}")
  */
  public function getUserById(Request $request, $id)
  {
    $em = $this->getDoctrine()->getManager();

    $query = $em->createQuery("SELECT u FROM AppBundle:User u WHERE u.id = '".$id."'");
    $data = $query->getResult();

      $view = $this->view($data, Response::HTTP_INTERNAL_SERVER_ERROR);
     return $view;
  }

  /**
  * @Rest\Post("/api/users")
  */
  public function postUser(Request $request)
  {

    $em = $this->getDoctrine()->getManager();

    $body = $request->getContent();

    if (!empty($body)) { $params = json_decode($body, false); }

    $name = $params->name;
    $surname = $params->surname;
    $email = $params->email;
    $password = $params->password;
    $address = $params->address;
    $city = $params->city;
    $postalCode = $params->postal_code;
    $avatar = $params->avatar;

    $user = new User($name, $surname, $email, $password, $address, $city, $postalCode, $avatar);

    $em = $this->getDoctrine()->getManager();
    $em->persist($user);
    $em->flush();

    $params = json_decode($body, true);

    $view = $this->view($params, Response::HTTP_INTERNAL_SERVER_ERROR);
    return $view;
  }

}
