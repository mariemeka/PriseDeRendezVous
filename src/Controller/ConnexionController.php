<?php

namespace App\Controller;

use App\Security\LoginFormAuth;
use App\Form\InscriptionType;
use App\Form\RendezvousType;
use App\Controller\RendezvousController;
use App\Entity\RendezVous;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\FormulaireInscription;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;



class ConnexionController extends AbstractController {

 /**
     * @Route("/connexion", name="connexion", methods={"GET","POST"})
     */

  
public function connexion(AuthenticationUtils $authenticationUtils)
{
$error = $authenticationUtils->getLastAuthenticationError();

$lastUsername = $authenticationUtils->getLastUsername();

return $this->render('inscription/login.html.twig',
                    ['last_username'=>$lastUsername, 'error' => $error]);
}

    /**
     * @Route("/logout", name="logout")
     */
public function logout()
{
  //a
}


}










?>


