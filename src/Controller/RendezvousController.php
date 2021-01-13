<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\RendezvousType;
use App\Entity\RendezVous;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class RendezvousController extends AbstractController
{
    /**
     * @Route("/rendezvous", name="rendezvous")
     */


    public function rendezvous(Request $request, EntityManagerInterface $em)
    {
        $user = new RendezVous();

        $form = $this->createForm(RendezvousType::class, $user);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            $em->persist($user);
            $em->flush();
        }
        
        return $this->render('rendezvous/rendez.html.twig', 
        ['form' =>$form->createView()]);
    }
   
   
    
}
