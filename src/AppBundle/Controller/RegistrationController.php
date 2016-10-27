<?php

namespace AppBundle\Controller;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\User;

class RegistrationController extends Controller
{

    /**
     * @Route("/registration")
     */
     public function registrationAction(Request $request)
     {
       $session = $request->getSession();

       $message = "";

       $user = new User();

       $form = $this->createFormBuilder($user)
           ->add('name', TextType::class, array('label' => 'Imie'))
           ->add('surname', TextType::class, array('label' => 'Nazwisko'))
           ->add('email', TextType::class, array('label' => 'E-mail'))
           ->add('password', TextType::class, array('label' => 'Hasło'))
           ->add('address', TextType::class, array('label' => 'Ulica i nr mieszkania'))
           ->add('city', TextType::class, array('label' => 'Miasto'))
           ->add('postalCode', TextType::class, array('label' => 'Kod pocztowy'))
           ->add('avatar', FileType::class, array('label' => 'Avatar', 'required' => false))
           ->add('save', SubmitType::class, array('label' => 'Zarejestruj'))
           ->getForm();

           $form->handleRequest($request);

           if ($form->isSubmitted() && $form->isValid()) {

               $user = $form->getData();
               $email = $user->getEmail();

               $findUser = $this->getDoctrine()->getRepository('AppBundle:User')->findOneBy(array('email' => $email));

               if($findUser) {
                   $message = "Użytkownik już istnieje.";
                   return $this->render('default/alert.html.twig', array('msg' => $message));
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

                 $em = $this->getDoctrine()->getManager();
                 $em->persist($user);
                 $em->flush();

                 $message = "Zarejestrowano nowego użytkownika: " . $user->getName() . ". Zaloguj się.";

                 return $this->render('default/alert.html.twig', array('msg' => $message));
               }
           }

          return $this->render('default/registration.html.twig', array(
            'form' => $form->createView()
          ));
     }
}
