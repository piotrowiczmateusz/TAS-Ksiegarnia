<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class MyAccountController extends Controller
{
    /**
     * @Route("/my-account")
     */
    public function indexAction(Request $request)
    {
      $session = $request->getSession();
      $id = $session->get('id');

      $em = $this->getDoctrine()->getManager();

      $query = $em->createQuery("SELECT b FROM AppBundle:User b WHERE b.id = '".$id."'");
      $user = $query->getResult();

      $query = $em->createQuery("SELECT o FROM AppBundle:BookOrder o WHERE o.userId = '".$id."'");
      $orders = $query->getResult();

      return $this->render('default/my-account.html.twig', array(
        'name' => $session->get('name'),
        'user' => $user,
        'orders' => $orders)
      );

    }
}
?>
