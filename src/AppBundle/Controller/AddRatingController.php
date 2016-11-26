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

class AddRatingController extends Controller
{
  /**
   * @Route("/addrating")
   */
  public function addRatingAction(Request $request)
  {
    $session = $request->getSession();
    $em = $this->getDoctrine()->getManager();
    $id = $_GET["id"];
    $userID = $_GET['userID'];
    $rating = $_GET['rating'];

    $query0 = $em->createQuery("SELECT b.ratedBooks FROM AppBundle:User b WHERE b.id = '".$_GET['userID']."'");
    $ratedBooks= $query0->getResult();
    $rateBooksArr = explode(',', $ratedBooks[0]['ratedBooks']);

    $isInBase=false;
    $ratingToLess = 0;
    for($k=0; $k<count($rateBooksArr); $k++)
    {
      $rateBooksArr2 = explode('{', $rateBooksArr[$k]);
      if($rateBooksArr2[0]==$id)
      {
        $isInBase=true;
				$ratingToLessText1 = explode('{', $rateBooksArr[$k]);
				$ratingToLessText2 = explode('}', $ratingToLessText1[1]);
        $ratingToLess = $ratingToLessText2[0];
      }
    }
    if($isInBase==false)
    {
      $query = $em->createQuery("UPDATE AppBundle:Book b SET b.rating=b.rating+'".$rating."', b.votes=b.votes+1 WHERE b.id = '".$id."'");
      $query->getResult();

      if($rateBooksArr[1]=="") $newID = $ratedBooks[0]['ratedBooks'].$id."{".$rating."}";
      else $newID = $ratedBooks[0]['ratedBooks'].",".$id."{".$rating."}";
      $query2 = $em->createQuery("UPDATE AppBundle:User b SET b.ratedBooks='".$newID."' WHERE b.id = '".$userID."'");
      $query2->getResult();
    }
    else
    {
      $query = $em->createQuery("UPDATE AppBundle:Book b SET b.rating=b.rating-'".$ratingToLess."'+'".$rating."' WHERE b.id = '".$id."'");
      $query->getResult();
      $newID = ",".$id."{".$rating."}";
      $query2 = $em->createQuery("UPDATE AppBundle:User b SET b.ratedBooks='".$newID."' WHERE b.id = '".$userID."'");
      $query2->getResult();
    }
    return $this->redirect('/dashboard');
  }
}
