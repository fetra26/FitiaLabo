<?php

namespace App\Entity;

use App\Repository\ValeurRefRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ValeurRefRepository::class)]
class ValeurRef
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 3, nullable: true)]
    private ?string $libelle = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $unite = null;

    #[ORM\Column(nullable: true)]
    private ?int $signeComparaison = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $valeur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(?string $libelle): static
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getUnite(): ?string
    {
        return $this->unite;
    }

    public function setUnite(?string $unite): static
    {
        $this->unite = $unite;

        return $this;
    }

    public function getSigneComparaison(): ?int
    {
        return $this->signeComparaison;
    }

    public function setSigneComparaison(?int $signeComparaison): static
    {
        $this->signeComparaison = $signeComparaison;

        return $this;
    }

    public function getValeur(): ?string
    {
        return $this->valeur;
    }

    public function setValeur(?string $valeur): static
    {
        $this->valeur = $valeur;

        return $this;
    }
}
