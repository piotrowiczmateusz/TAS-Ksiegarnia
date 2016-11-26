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

use AppBundle\Entity\User;

class RegistrationController extends Controller
{

    /**
     * @Route("/registration")
     */
     public function registrationAction(Request $request)
     {
       $session = $request->getSession();

       $user = new User();

       $form = $this->createFormBuilder($user)
           ->add('name', TextType::class, array('label' => false))
           ->add('surname', TextType::class, array('label' => false))
           ->add('email', TextType::class, array('label' => false))
           ->add('password', PasswordType::class, array('label' => false))
           ->add('address', TextType::class, array('label' => false))
           ->add('city', TextType::class, array('label' => false))
           ->add('postalCode', TextType::class, array('label' => false))
           ->add('avatar', FileType::class, array('label' => 'Avatar', 'required' => false))
           ->add('save', SubmitType::class, array('label' => 'Zarejestruj'))
           ->getForm();

           $form->handleRequest($request);

           if ($form->isSubmitted() && $form->isValid()) {

               $user = $form->getData();
               $email = $user->getEmail();

               $findUser = $this->getDoctrine()->getRepository('AppBundle:User')->findOneBy(array('email' => $email));

               if($findUser) {
                 $this->addFlash('notice', 'Użytkownik już istnieje.');
               }
               else {

                 $file = $user->getAvatar();
                 if ($file != null) {
                   $fileName = md5(uniqid()).'.'.$file->guessExtension();
                   $file->move($this->getParameter('avatars_directory'), $fileName);
                   $user->setAvatar($fileName);
                 } else {
                   $user->setAvatar('default.png');
                 }

                 $encoder = $this->container->get('security.encoder_factory')->getEncoder($user);
                 $user->setPassword($encoder->encodePassword($user->getPassword(), $user->getSalt()));
                 $user->setUsername($user->getEmail());
                 $user->setRatedBooks(",");

                 $em = $this->getDoctrine()->getManager();
                 $em->persist($user);
                 $em->flush();

                 $this->addFlash('notice', 'Zarejestrowano nowego użytkownika: ' . $user->getName() . '. Zaloguj się.');

               }
           }

          return $this->render('default/registration.html.twig', array(
            'name' => $session->get('name'),
            'form' => $form->createView()
          ));
     }
}
