<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

use blackknight467\StarRatingBundle\Form\RatingType;

use AppBundle\Entity\Book;

class AddBookController extends Controller
{

    /**
     * @Route("/add-book")
     */
    public function addBookAction(Request $request)
    {
        $session = $request->getSession();

        $book = new Book();

        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('AppBundle:Category')->findAll();

        $rate = $book->getRating();

        $form = $this->createFormBuilder($book)
            ->add('title', TextType::class, array('label' => 'Tytuł'))
            ->add('author', TextType::class, array('label' => 'Autor'))
            ->add('description', TextareaType::class, array('label' => 'Opis'))
            ->add('category', ChoiceType::class, array(
              'label' => 'Kategoria',
              'choices'  => $categories,
              'choice_label' => 'title'))
            ->add('publisher', TextType::class, array('label' => 'Wydawca'))
            ->add('cover', FileType::class, array('label' => 'Okładka','required' => false))
            ->add('date', IntegerType::class, array('label' => 'Rok wydania'))
            ->add('isNew', CheckboxType::class, array('label' => 'Nowość', 'required' => false))
            ->add('isBestseller', CheckboxType::class, array('label' => 'Bestseller', 'required' => false))
            ->add('isDiscount', CheckboxType::class, array('label' => 'Przecena', 'required' => false))
            ->add('price', IntegerType::class, array('label' => 'Cena'))
            ->add('discountPrice', IntegerType::class, array('label' => 'Przecena'))
            ->add('save', SubmitType::class, array('label' => 'Dodaj'))
            ->getForm();

            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {

                $book = $form->getData();
                $category = $book->getCategory()->getTitle();

                  $file = $book->getCover();
                if ($file != null) {
                  $fileName = md5(uniqid()).'.'.$file->guessExtension();
                  $file->move($this->getParameter('covers_directory'), $fileName);
                    $book->setCover($fileName);
                } else {
                    $book->setCover("");
                }


                $book->setCategory($category);
                $book->setRating(0);
                $book->setvotes(0);

                $em->persist($book);
                $em->flush();

                $this->addFlash('notice', 'Dodano nową książkę.');

            }

          return $this->render('default/add-book.html.twig', array(
              'name' => $session->get('name'),
              'form' => $form->createView(),
              'categories' => $categories,
              'rate' => $rate
          ));
    }
}
