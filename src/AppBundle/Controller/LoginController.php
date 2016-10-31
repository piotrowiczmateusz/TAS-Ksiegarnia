<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use AppBundle\Entity\User;

class LoginController extends Controller
{

  /**
   * @Route("/login")
   */
  public function loginAction(Request $request)
  {
    $session = $request->getSession();

    $user = new User();

    $form = $this->createFormBuilder($user)
        ->add('email', TextType::class, array('label' => 'E-mail'))
        ->add('password', TextType::class, array('label' => 'Hasło'))
        ->add('save', SubmitType::class, array('label' => 'Zaloguj'))
        ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $user = $form->getData();

            $email = $user->getEmail();
            $password = $user->getPassword();

            $findUser = $this->getDoctrine()->getRepository('AppBundle:User')->findOneBy(array('email' => $email));

            if($findUser) {
                if($findUser->getPassword() == $password) {
                    $session->set('id', $findUser->getId());
                    $session->set('name', $findUser->getName());

                    $this->addFlash('notice', 'Zalogowano poprawnie.');
                    return $this->redirect('/dashboard');
                }
                else { $this->addFlash('error', 'Niepoprawne hasło.'); }
            }
            else { $this->addFlash('error', 'Użytkownik nie istnieje.'); }
        }
       return $this->render('default/login.html.twig', array(
         'form' => $form->createView()
       ));
  }

  /**
   * @Route("/logout")
   */
  public function logoutAction(Request $request)
  {
      $session = $request->getSession();
      $session->clear('id');
      $session->remove('id');
      $session->clear('name');
      $session->remove('name');
      $session->clear('cart');
      $session->remove('cart');
      unset($session);

      $response = new Response();
      $response->headers->clearCookie('id');
      $response->headers->clearCookie('name');
      $response->headers->clearCookie('cart') ;
      $response->send();

      $this->addFlash('notice', 'Wylogowano poprawnie.');

      return $this->redirect('/dashboard');

  }

}
