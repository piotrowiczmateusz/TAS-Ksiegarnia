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
        ->add('email', TextType::class, array('label' => false))
        ->add('password', PasswordType::class, array('label' => false))
        ->add('save', SubmitType::class, array('label' => 'Zaloguj'))
        ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $user = $form->getData();

            $email = $user->getEmail();

            $findUser = $this->getDoctrine()->getRepository('AppBundle:User')->findOneBy(array('email' => $email));

            if($findUser) {

                $encoder = $this->container->get('security.encoder_factory')->getEncoder($user);
                $password = $encoder->encodePassword($user->getPassword(), $findUser->getSalt());

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
   * @Route("/restore-password")
   */
  public function restorePasswordAction(Request $request)
  {
      $email = $request->get('email');

      $findUser = $this->getDoctrine()->getRepository('AppBundle:User')->findOneBy(array('email' => $email));

      if($findUser) {

        $tokenGenerator = $this->container->get('fos_user.util.token_generator');
        $randomPassword = substr($tokenGenerator->generateToken(), 0, 12);

        $encoder = $this->container->get('security.encoder_factory')->getEncoder($findUser);
        $findUser->setPassword($encoder->encodePassword($randomPassword, $findUser->getSalt()));

        $em = $this->getDoctrine()->getManager();
        $em->persist($findUser);
        $em->flush();

        $message = \Swift_Message::newInstance()
          ->setSubject('Księgarnia TAS - przypomnienie hasła')
          ->setFrom('ksiegarniatas@gmail.com')
          ->setTo($email)
          ->setBody(
              $this->renderView('email/restore-password.html.twig', array(
                'password' => $randomPassword)
              ),
            'text/html'
          );
        $this->get('mailer')->send($message);

        $this->addFlash('notice', 'Wysłano nowe hasło na podany e-mail. Możesz je zmienić w ustawieniach konta.');

      } else {
        $this->addFlash('error', 'Nie istnieje użytkownik o podanym adresie e-mail.');
      }

      return $this->redirect('/login');

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
