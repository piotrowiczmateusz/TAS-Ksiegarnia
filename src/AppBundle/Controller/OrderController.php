<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
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

    if($session->get('name')) {
      return $this->redirect('/order/step2');
    }

    return $this->render('default/order/step1.html.twig', array(
      'cart' => $cart)
    );

  }

    /**
     * @Route("/order/step2")
     */
    public function step2(Request $request)
    {

        $session = $request->getSession();

        if($session->get('name'))
        {

          $name = $session->get('name');
          $user = $this->getDoctrine()->getRepository('AppBundle:User')->findOneBy(array('name' => $name));

          $name = $user->getName();
          $surname = $user->getName();
          $email = $user->getEmail();
          $address = $user->getName();
          $city = $user->getName();
          $postalCode =$user->getName();
        }
        else
        {
          $name = $_POST['name'];
          $surname = $_POST['surname'];
          $email = $_POST['email'];
          $address = $_POST['address'];
          $city = $_POST['city'];
          $postalCode = $_POST['postalCode'];
        }

        $cart = $session->get('cart');

        return $this->render('default/order/step2.html.twig', array(
          'name' => $name,
          'surname' => $surname,
          'email' => $email,
          'cart' => $cart,
          'address' => $address,
          'city' => $city,
          'postalCode' => $postalCode)
        );


      }

      /**
       * @Route("/order/final")
       */
      public function orderFinal(Request $request)
      {
        $session = $request->getSession();

        $name = $session->get('name');
        $cart = $session->get('cart');

        $bookArray = array_pop($cart);
        $book = array_pop($bookArray);

        $user = $this->getDoctrine()->getRepository('AppBundle:User')->findOneBy(array('name' => $name));
        ($user) ? $userID = $user->getId() : $userID = 0;
    
        $bookID = $book->getId();
        $date = new \DateTime();
        $type = "typ";

        $order = new BookOrder($userID, $bookID, $date, $type);

        $em = $this->getDoctrine()->getManager();
        $em->persist($order);
        $em->flush();

        $session->set('cart', array());

        $message = 'Zamowienie zostalo zlozone. Potwierdzenie zostalo wyslana na adres e-mail.';

        return $this->render('default/alert.html.twig', array(
          'name' => $name,
          'msg' => $message)
        );

      }

    }


?>
