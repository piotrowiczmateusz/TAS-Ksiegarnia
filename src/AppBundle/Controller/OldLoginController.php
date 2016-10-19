<?php

// src/AppBundle/Controller/LoginController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use AppBundle\Entity\User;

class OldLoginController extends Controller
{
    /**
     * @Route("/sign-in")
     */
    public function signInAction(Request $request)
    {

        $email = $_POST['email'];
        $password = $_POST['password'];

        $message = "";

        $user = $this->getDoctrine()->getRepository('AppBundle:User')->findOneBy(array('email' => $email));

        if($user) {
            if($user->getPassword() == $password) {
                $session = $request->getSession();
                $session->start();
                $session->set('name', $user->getName());

                return $this->redirect('/dashboard');
            }
            else {
                $message = "Niepoprawne hasło.";
            }
        }
        else {
            $message = "Użytkownik nie istnieje.";
        }
        return $this->render('default/register.html.twig', array('msg' => $message));
    }

    /**
     * @Route("/sign-out")
     */
    public function signOutAction(Request $request)
    {
        $session = $request->getSession();
        $session->clear('name');
        $session->remove('name');
        unset($session);

        $response = new Response();
        $response->headers->clearCookie('cookname') ;
        $response->send();

        return $this->render('default/index.html.twig');
    }
}
?>
