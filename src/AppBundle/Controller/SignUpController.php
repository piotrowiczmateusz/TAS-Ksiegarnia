<?php

// src/AppBundle/Controller/SignUpController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\User;
use AppBundle\Entity\Book;

class SignUpController extends Controller
{
    /**
     * @Route("/sign-up")
     */
    public function indexAction()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $message = "";

        $user = $this->getDoctrine()->getRepository('AppBundle:User')->findOneBy(array('email' => $email));

        if($user) {
            $message = "Użytkownik już istnieje.";
        }
        else {
          
            $user = new User($name, $email, $password);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user); // tells Doctrine you want to (eventually) save the Product (no queries yet)
            $em->flush(); // actually executes the queries (i.e. the INSERT query)

            $message = "Zarejestrowano nowego użytkownika: " . $user->getName() . ". Zaloguj się.";
        }
        return $this->render('default/register.html.twig', array('msg' => $message));
    }
}
?>
