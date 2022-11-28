<?php

namespace App\Entity;

use App\Repository\POSTERepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: POSTERepository::class)]
class POSTE
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $descriptionPoste = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $datePoste = null;

    #[ORM\Column(length: 50)]
    private ?string $statusPoste = null;

    #[ORM\Column]
    private ?int $nombreReponse = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imagePoste = null;

    #[ORM\ManyToOne(inversedBy: 'myPoste')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    public function __construct()
    {
        $this->nOTIFICATIONs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescriptionPoste(): ?string
    {
        return $this->descriptionPoste;
    }

    public function setDescriptionPoste(string $descriptionPoste): self
    {
        $this->descriptionPoste = $descriptionPoste;

        return $this;
    }

    public function getDatePoste(): ?\DateTimeInterface
    {
        return $this->datePoste;
    }

    public function setDatePoste(\DateTimeInterface $datePoste): self
    {
        $this->datePoste = $datePoste;

        return $this;
    }

    public function getStatusPoste(): ?string
    {
        return $this->statusPoste;
    }

    public function setStatusPoste(string $statusPoste): self
    {
        $this->statusPoste = $statusPoste;

        return $this;
    }

    public function getNombreReponse(): ?int
    {
        return $this->nombreReponse;
    }

    public function setNombreReponse(int $nombreReponse): self
    {
        $this->nombreReponse = $nombreReponse;

        return $this;
    }

    public function getImagePoste(): ?string
    {
        return $this->imagePoste;
    }

    public function setImagePoste(?string $imagePoste): self
    {
        $this->imagePoste = $imagePoste;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
    
}
