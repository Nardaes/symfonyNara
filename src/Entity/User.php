<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column]
    private ?int $anneeNaissance = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photoDeProfil = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $bioUser = null;

    #[ORM\Column]
    private ?int $nombreAbonnee = null;

    #[ORM\Column]
    private ?int $nombreAbonnement = null;

    #[ORM\Column]
    private ?bool $notifActive = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $paysPref = null;

    #[ORM\Column(length: 255)]
    private ?string $pseudo = null;

    #[ORM\Column]
    private ?bool $actif = null;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: POSTE::class)]
    private Collection $myPoste;

    public function __construct()
    {
        $this->myPoste = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    
    public function getAnneeNaissance(): ?int
    {
        return $this->anneeNaissance;
    }

    public function setAnneeNaissance(int $anneeNaissance): self
    {
        $this->anneeNaissance = $anneeNaissance;

        return $this;
    }

    public function getPhotoDeProfil(): ?string
    {
        return $this->photoDeProfil;
    }

    public function setPhotoDeProfil(?string $photoDeProfil): self
    {
        $this->photoDeProfil = $photoDeProfil;

        return $this;
    }

    public function getBioUser(): ?string
    {
        return $this->bioUser;
    }

    public function setBioUser(?string $bioUser): self
    {
        $this->bioUser = $bioUser;

        return $this;
    }

    public function getNombreAbonnee(): ?int
    {
        return $this->nombreAbonnee;
    }

    public function setNombreAbonnee(int $nombreAbonnee): self
    {
        $this->nombreAbonnee = $nombreAbonnee;

        return $this;
    }

    public function getNombreAbonnement(): ?int
    {
        return $this->nombreAbonnement;
    }

    public function setNombreAbonnement(int $nombreAbonnement): self
    {
        $this->nombreAbonnement = $nombreAbonnement;

        return $this;
    }

    public function isNotifActive(): ?bool
    {
        return $this->notifActive;
    }

    public function setNotifActive(bool $notifActive): self
    {
        $this->notifActive = $notifActive;

        return $this;
    }

    public function getPaysPref(): ?string
    {
        return $this->paysPref;
    }

    public function setPaysPref(?string $paysPref): self
    {
        $this->paysPref = $paysPref;

        return $this;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function isActif(): ?bool
    {
        return $this->actif;
    }

    public function setActif(bool $actif): self
    {
        $this->actif = $actif;

        return $this;
    }

    /**
     * @return Collection<int, POSTE>
     */
    public function getMyPoste(): Collection
    {
        return $this->myPoste;
    }

    public function addMyPoste(POSTE $myPoste): self
    {
        if (!$this->myPoste->contains($myPoste)) {
            $this->myPoste->add($myPoste);
            $myPoste->setUser($this);
        }

        return $this;
    }

    public function removeMyPoste(POSTE $myPoste): self
    {
        if ($this->myPoste->removeElement($myPoste)) {
            // set the owning side to null (unless already changed)
            if ($myPoste->getUser() === $this) {
                $myPoste->setUser(null);
            }
        }

        return $this;
    }
}
