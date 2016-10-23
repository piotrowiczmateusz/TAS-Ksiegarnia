<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
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

    return $this->render('default/cart.html.twig', array(
      'name' => $session->get('name'),
      'cart' => $cart)
    );

  }

    /**
     * @Route("/add-to-cart")
     */
    public function addToCart(Request $request)
    {
      $session = $request->getSession();

      if($session->get('name') == null) {

        $message = "Musisz się zalogować, aby dodawać przedmioty do koszyka.";

        return $this->render('default/alert.html.twig', array(
          'msg' => $message)
        );

      } else {
        $id = $_GET['id'];

        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery("SELECT b FROM AppBundle:Book b WHERE b.id = ".$id);
        $book = $query->getResult();

        ($session->get('cart') != null) ? $cart = $session->get('cart') : $cart = array();

        array_push($cart, $book);

        $session = $request->getSession();
        $session->set('cart', $cart);

        return $this->redirect('/cart');
      }

    }

    /**
     * @Route("/remove-from-cart")
     */
    public function removeFromCart(Request $request)
    {
      $session = $request->getSession();
      $id = $session->get('id');

      // ...

      return $this->render('default/cart.html.twig', array(
        'name' => $session->get('name'),
        'cart' => $cart)
      );

    }

}
?>
