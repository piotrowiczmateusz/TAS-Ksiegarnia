<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

class CartController extends Controller
{

  /**
   * @Route("/cart")
   */
  public function indexAction(Request $request)
  {
    $session = $request->getSession();
    $cart = $session->get('cart');
    $em = $this->getDoctrine()->getManager();
    $categories = $em->getRepository('AppBundle:Category')->findAll(array(), array('title' => 'asc'));

    return $this->render('default/cart.html.twig', array(
      'name' => $session->get('name'),
      'categories' => $categories,
      'cart' => $cart)
    );

  }

    /**
     * @Route("/add-to-cart")
     */
    public function addToCart(Request $request)
    {
      $session = $request->getSession();

        $id = $_GET['id'];

        $em = $this->getDoctrine()->getManager();

        $book = $em->getRepository('AppBundle:Book')->findOneById($id);

        ($session->get('cart') != null) ? $cart = $session->get('cart') : $cart = array();

        array_push($cart, $book);

        $session->set('cart', $cart);

        return $this->redirect('/cart');

    }

    /**
     * @Route("/remove-from-cart")
     */
    public function removeFromCart(Request $request)
    {
      $session = $request->getSession();
      $id = $_GET['id'];

      $cart = $session->get('cart');

      $remove = true;

      foreach($cart as $book => $b) {
        if ($b->getId() == $id && $remove == true) {
             unset($cart[$book]);
             $remove = false;
         }
      }

      $session->set('cart', $cart);

      return $this->redirect('cart');

    }

}
?>
