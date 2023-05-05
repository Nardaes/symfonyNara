<?php

namespace App\Entity;

use App\Repository\FavoryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FavoryRepository::class)]
class Favory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'myFav')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $favUser = null;

    #[ORM\ManyToOne(inversedBy: 'userWhoFav')]
    #[ORM\JoinColumn(nullable: false)]
    private ?POSTE $favPoste = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFavUser(): ?User
    {
        return $this->favUser;
    }

    public function setFavUser(?User $favUser): self
    {
        $this->favUser = $favUser;

        return $this;
    }

    public function getFavPoste(): ?POSTE
    {
        return $this->favPoste;
    }

    public function setFavPoste(?POSTE $favPoste): self
    {
        $this->favPoste = $favPoste;

        return $this;
    }
}
