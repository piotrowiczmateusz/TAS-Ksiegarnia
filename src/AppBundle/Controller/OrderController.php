<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

use AppBundle\Entity\BookOrder;
use AppBundle\Entity\User;
use AppBundle\Entity\Book;

class OrderController extends Controller
{

  /**
   * @Route("/order")
   */
  public function step1(Request $request)
  {
    $session = $request->getSession();
    $cart = $session->get('cart');

    if(empty($cart)) {
      $this->addFlash('notice', 'Wybierz produkty.');
      return $this->redirect('/cart');
    } else {
      if($session->get('name')) {
        return $this->redirect('/order/step2');
      }

      return $this->render('default/order/step1.html.twig', array(
        'cart' => $cart)
      );
    }
  }

    /**
     * @Route("/order/step2")
     */
    public function step2(Request $request)
    {

        $session = $request->getSession();

        if($session->get('name'))
        {
          $user = $this->getDoctrine()->getRepository('AppBundle:User')->findOneById($session->get('id'));
        }
        else
        {
          $user = new User();

          $user->setName($_POST['name']);
          $user->setSurname($_POST['surname']);
          $user->setEmail($_POST['email']);
          $user->setAddress($_POST['address']);
          $user->setCity($_POST['city']);
          $user->setPostalCode($_POST['postalCode']);
        }

        $cart = $session->get('cart');

        return $this->render('default/order/step2.html.twig', array(
          'name' => $session->get('name'),
          'user' => $user,
          'cart' => $cart)
        );

      }

      /**
       * @Route("/order/final")
       */
      public function orderFinal(Request $request)
      {
        $session = $request->getSession();

        $id = $session->get('id');
        $cart = $session->get('cart');

        $book = array_pop($cart);

        $user = $this->getDoctrine()->getRepository('AppBundle:User')->findOneById($id);
        ($user) ? $userID = $user->getId() : $userID = 0;

        $bookID = $book->getId();
        $date = new \DateTime();
        $type = "typ";

        $order = new BookOrder($userID, $bookID, $date, $type);

        $em = $this->getDoctrine()->getManager();
        $em->persist($order);
        $em->flush();

        $session->set('cart', array());

        $this->addFlash('notice', 'Zamówienie zostało złożone. Potwierdzenie zostało wysłane na adres e-mail.');

        return $this->render('default/cart.html.twig', array(
          'name' => $session->get('name'),
          'cart' => $session->get('cart'))
        );

      }

      /**
       * @Route("/order-details")
       */
      public function orderDetails(Request $request)
      {
        $session = $request->getSession();

        $name = $session->get('name');
        $id = $_GET['id'];

        $em = $this->getDoctrine()->getManager();

        $order = $em->getRepository('AppBundle:BookOrder')->findOneBy(array('id' => $id));
        $user = $em->getRepository('AppBundle:User')->findOneById($order->getUserId());
        $book = $em->getRepository('AppBundle:Book')->findOneById($order->getBookId());

        return $this->render('default/order-details.html.twig', array(
          'name' => $name,
          'order' => $order,
          'user' => $user,
          'book' => $book)
        );

    }
  }
?>
