<?php

namespace App\Controller;

use App\Form\InscriptionType;
use App\Form\RendezvousType;
use App\Controller\RendezvousController;
use App\Entity\RendezVous;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\FormulaireInscription;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class InscriptionController extends AbstractController
{
    /**
     * @Route("/inscription", name="inscription")
     */

     
public function inscription(Request $request, EntityManagerInterface $em, UserPasswordEncoderInterface $encoder)
{


$user = new FormulaireInscription();

$form = $this->createForm(InscriptionType::class, $user);
$form->handleRequest($request);

if($form->isSubmitted() && $form->isValid()){
   $hash = $encoder->encodePassword($user, $user->getPassword());
   $user->setPassword($hash);
    
    $em->persist($user);
    $em->flush();

        /**
         * @Route("/rendezvous", name="rendezvous")
         */

        $user1 = new RendezVous();

        $form1 = $this->createForm(RendezvousType::class, $user1);
        $form1->handleRequest($request);
        
        if($form1->isSubmitted() && $form1->isValid()){
            $em->persist($user1);
            $em->flush();

        }
            return $this->render('rendezvous/rendez.html.twig', 
            ['form' =>$form1->createView()]);

}


return $this->render('inscription/register.html.twig',
                     ['form' =>$form->createView()]);

}


    
    

    /** 
*@Route("/connexion"), name="connexion", methods={"GET","POST"})
*/

public function connexion(AuthenticationUtils $authenticationUtils)
{
$error = $authenticationUtils->getLastAuthenticationError();

$lastUsername = $authenticationUtils->getLastUsername();

return $this->render('inscription/login.html.twig',
                    ['last_username'=>$lastUsername, 'error' => $error]);
}
   
}