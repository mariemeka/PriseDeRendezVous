<?php

namespace App\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authenticator\AuthenticatorInterface;
use Stmfony\Component\Security\Http\authenticator\Passport\PassportInterface;
use App\Entity\FormulaireInscription;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Repository\FormulaireInscriptionRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\AbstractGuardAuthenticator;


class LoginFormAuth implements AuthenticatorInterface 
{

    private $userRepository;
    public function __construct(FormulaireInscriptionRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function supports(Request $request): ?bool
    {
        return $request->attributes->get('_route') === 'connexon2'
        && $request->isMethod('POST');
    }

    /**
    * 
    * @throws authenticationException
    */
    public function authenticate(Request $request): PassportInterface
    {
        $user = $this->FormulaireInscriptionRepository->findOneByEmail($request->request->get('email'));
        
        if(! $user){
            throw new CustomUserMessageAuthenticationException('invalide email');
        }

        return new Passport($user, PasswordCredentials($request->get('password')),[
            new CsrfTokenBadge('loginform', $request->get('csrf_token')),

            new PasswordUpgradeBadge($request->get('password'), $this->FormulaireInscriptionRepository)
        ]);
   }

    /**
    * 
    * @see AbstractAuthenticator
    *
    * @param
    */
    public function createAuthenticatedToken(PassportInterface $passport, string $firewallName): TokenInterface 
    {

    }
    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        // on success, let the request continue
     
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): ?Response
    {
       
        //return new JsonRe
    }



}

?>