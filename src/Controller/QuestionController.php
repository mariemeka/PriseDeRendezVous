<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController extends AbstractController {

/**
 * @Route("/")
 */
  public function homepage()
  {
    $content = "Hello symfony !";

    return new Response($content);
  }
  /**
 * @Route("/questions/{slug}")
 */
public function show($slug){
    
    return $this->render('question/show.html.twig',
   ['question' => $slug]);
}

}

?>