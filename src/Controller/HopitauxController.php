<?php



namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HopitauxController extends AbstractController {

 /**
 * @Route("/mespages/hopitaux")
 */
public function hopitaux(){
    
  return $this->render('mespages/hopitaux.html.twig');
}

}

?>