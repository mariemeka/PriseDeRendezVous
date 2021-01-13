<?php



namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController {

/**
 * @Route("/mespages/contact")
 */
  public function contact()
  {
    return $this->render('mespages/contact.html.twig');
  }
  
 /**
 * @Route("/mespages/specialiste")
 */
public function specialiste(){
    
  return $this->render('mespages/specialiste.html.twig');
}

 /**
 * @Route("/mespages/rendezvous")
 */
public function rendezvous(){
    
  return $this->render('mespages/rendezvous.html.twig');
}

 /**
 * @Route("/mespages/hopitaux")
 */
public function hopitaux(){
    
  return $this->render('mespages/hopitaux.html.twig');
}



}

?>