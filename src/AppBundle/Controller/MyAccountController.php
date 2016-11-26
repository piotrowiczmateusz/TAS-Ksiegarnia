<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class MyAccountController extends Controller
{
    /**
     * @Route("/my-account")
     */
    public function indexAction(Request $request)
    {

      $session = $request->getSession();
      ($session->get('cart')) ? $cart = $session->get('cart') : $cart = array();
      $id = $session->get('id');

      $em = $this->getDoctrine()->getManager();

      $user = $em->getRepository('AppBundle:User')->findOneBy(array('id' => $id));
      $orders = $em->getRepository('AppBundle:BookOrder')->findByUserId($id, array('orderDate' => 'asc'));
      $avatar = $user->getAvatar();

      $form = $this->createFormBuilder($user)
          ->add('name', TextType::class, array('label' => 'Imię', 'disabled' => true))
          ->add('surname', TextType::class, array('label' => 'Nazwisko', 'disabled' => true))
          ->add('email', TextType::class, array('label' => 'E-mail', 'disabled' => true))
          ->add('password', PasswordType::class, array('label' => 'Hasło'))
          ->add('address', TextType::class, array('label' => 'Ulica i nr mieszkania'))
          ->add('city', TextType::class, array('label' => 'Miasto'))
          ->add('postalCode', TextType::class, array('label' => 'Kod pocztowy'))
          ->add('avatar', FileType::class, array('label' => 'Avatar', 'required' => false, 'data' => ''))
          ->add('save', SubmitType::class, array('label' => 'Zapisz zmiany'))
          ->getForm();

          $form->handleRequest($request);

          if ($form->isSubmitted() && $form->isValid()) {

                $file = $user->getAvatar();
                if ($file != null) {
                  $fileName = md5(uniqid()).'.'.$file->guessExtension();
                  $file->move($this->getParameter('avatars_directory'), $fileName);
                  $user->setAvatar($fileName);
                } else {
                  $user->setAvatar($avatar);
                }

                $em->persist($user);
                $em->flush();

                $this->addFlash('notice', 'Zapisano zmiany.');

          }

      return $this->render('default/my-account.html.twig', array(
        'name' => $session->get('name'),
        'cart' => $cart,
        'form' => $form->createView(),
        'user' => $user,
        'orders' => $orders)
      );

    }
}
