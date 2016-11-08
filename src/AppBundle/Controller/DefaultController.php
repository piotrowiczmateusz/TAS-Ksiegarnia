<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

class DefaultController extends Controller
{

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
      return $this->redirect("/dashboard");
    }

    /**
     * @Route("/about")
     */
    public function aboutAction(Request $request)
    {
      $session = $request->getSession();

      return $this->render('default/about.html.twig', array(
        'name' => $session->get('name'))
      );

    }

    /**
     * @Route("/contact")
     */
    public function contactAction(Request $request)
    {
      $session = $request->getSession();

      return $this->render('default/contact.html.twig', array(
        'name' => $session->get('name'))
      );

    }

    /**
     * @Route("/help")
     */
    public function helpAction(Request $request)
    {
      $session = $request->getSession();

      return $this->render('default/help.html.twig', array(
        'name' => $session->get('name'))
      );

    }
    
}
