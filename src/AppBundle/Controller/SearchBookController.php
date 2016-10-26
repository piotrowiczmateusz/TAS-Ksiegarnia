<?php

// src/AppBundle/Controller/AddBookController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Book;

class SearchBookController extends Controller
{
  /**
   * @Route("/search-book")
   */
    public function searchBookAction()
    {
      $em = $this->getDoctrine()->getManager();
      //
      $query = $em->createQuery("SELECT b.title FROM AppBundle:Book b WHERE b.title LIKE '".$_GET["search"]."%'");
      $bestsellers = $query->getResult();
      echo "<div class='liveSearch'>";

      for($i=0; $i<count($bestsellers); $i++)
      {
          echo "<a href=#><div class='liveSearchRow'>";
          echo "<div class='liveSearchRow2'>".$bestsellers[$i]['title']."</div>";
          echo "</div></a>";
      }
       echo "</div>";
      return $this->render('base.html.twig');
    }



}
?>
