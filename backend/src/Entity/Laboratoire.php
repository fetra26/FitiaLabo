<?php

namespace App\Entity;

use App\Repository\LaboratoireRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LaboratoireRepository::class)]
class Laboratoire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $nom = null;

    #[ORM\Column(length: 100)]
    private ?string $adresse = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $numeroArrete = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $stat = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $nif = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $numeroLabo = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getNumeroArrete(): ?string
    {
        return $this->numeroArrete;
    }

    public function setNumeroArrete(?string $numeroArrete): static
    {
        $this->numeroArrete = $numeroArrete;

        return $this;
    }

    public function getStat(): ?string
    {
        return $this->stat;
    }

    public function setStat(?string $stat): static
    {
        $this->stat = $stat;

        return $this;
    }

    public function getNif(): ?string
    {
        return $this->nif;
    }

    public function setNif(?string $nif): static
    {
        $this->nif = $nif;

        return $this;
    }

    public function getNumeroLabo(): ?string
    {
        return $this->numeroLabo;
    }

    public function setNumeroLabo(?string $numeroLabo): static
    {
        $this->numeroLabo = $numeroLabo;

        return $this;
    }
}
