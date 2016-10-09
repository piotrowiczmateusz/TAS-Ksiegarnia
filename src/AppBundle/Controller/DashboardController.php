<?php

// src/AppBundle/Controller/DashboardController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use AppBundle\Entity\User;

class DashboardController extends Controller
{
    /**
     * @Route("/dashboard")
     */
    public function indexAction(Request $request)
    {
        $session = $request->getSession();

        if($request->getSession()->isStarted()) {
            return $this->render('default/dashboard.html.twig', array('name' => $session->get('name')));
        }
        else {
            return $this->render('default/index.html.twig');
        }

    }
}
?>
