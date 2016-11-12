<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use blackknight467\StarRatingBundle\Form\RatingType;

use AppBundle\Entity\Book;

class BookDetailsController extends Controller
{
    /**
     * @Route("/books/{id}")
     */
    public function indexAction(Request $request, $id)
    {
      $session = $request->getSession();
      ($session->get('cart')) ? $cart = $session->get('cart') : $cart = array();

      $em = $this->getDoctrine()->getManager();

      $categories = $em->getRepository('AppBundle:Category')->findAll(array(), array('title' => 'asc'));
      $book = $em->getRepository('AppBundle:Book')->findOneById($id);

      $rating = $book->getRating();
      $votes = $book->getvotes();
      $cover = $book->getCover();

      if($votes == 0) { $votes = 1; }

      $form = $this->createFormBuilder($book)
          ->add('rating', RatingType::class, [
            'label' => false,
            'data' => strval($rating/$votes)
          ])
          ->add('cover', FileType::class, array('label' => false, 'data_class' => null, 'required' => false, 'attr'=>array('style'=>'display:none;')))
          ->add('rate', SubmitType::class, array('label' => 'Dodaj ocenę'))
          ->getForm();

          $form->handleRequest($request);

          if ($form->isSubmitted() && $form->isValid()) {

              $book->setCover($cover);
              $book->setRating($book->getRating() + $rating);
              $book->setVotes($book->getVotes()+1);

              $em->persist($book);
              $em->flush();

          }

      return $this->render('default/book-details.html.twig', array(
        'name' => $session->get('name'),
        'cart' => $cart,
        'categories' => $categories,
        'book' => $book,
        'form' => $form->createView())
      );

    }
}
?>
