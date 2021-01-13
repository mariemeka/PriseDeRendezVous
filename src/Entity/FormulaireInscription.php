<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use App\Repository\FormulaireInscriptionRepository;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=FormulaireInscriptionRepository::class)
 * @UniqueEntity(
 *      fields={"email"},
 *      message="l'email que vous avez tapé est deja utilisé ! "
 * )
 */
class FormulaireInscription implements UserInterface, \Serializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *      min = 6,
     *      minMessage = "votre mot de passe est court {{ limit }} caractere " )
     * @Assert\EqualTo(propertyPath = "confPassword",
     * message="Vous n'avez pas saisi le meme mot de passe !" )
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\EqualTo(propertyPath = "password",
     *  message="Vous n'avez pas saisi le meme mot de passe !" )
     */
    private $confPassword;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telephone;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getConfPassword(): ?string
    {
        return $this->confPassword;
    }

    public function setConfPassword(string $confPassword): self
    {
        $this->confPassword = $confPassword;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getRoles()
    {
        return ['ROLE_USER'];
    }

    public function getSalt() {
        // Do nothing because of X and Y.
    }
    
    public function eraseCredentials() {
        // Do nothing because of X and Y.
    }

  
    public function getUsername() {
        // Do nothing because of X and Y.
    }

    
    public function serialize() 
    {
       return serialize([
            $this->id,
            $this->nom,
            $this->prenom,
            $this->email,
            $this->password,
            $this->confPassword,
            $this->adresse,
            $this->telephone
       ]);
    }

    public function unserialize($string) 
    {
        list (
            $this->id,
            $this->nom,
            $this->prenom,
            $this->email,
            $this->password,
            $this->confPassword,
            $this->adresse,
            $this->telephone
        ) = unserialize($string, ['allowed_classes' => false]);
        
     }

}
