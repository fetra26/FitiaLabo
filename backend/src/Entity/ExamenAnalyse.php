<?php

namespace App\Entity;

use App\Repository\ExamenAnalyseRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExamenAnalyseRepository::class)]
class ExamenAnalyse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'examenAnalyses')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Analyse $analyse = null;

    #[ORM\ManyToOne(inversedBy: 'examenAnalyses')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Examen $examen = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnalyse(): ?Analyse
    {
        return $this->analyse;
    }

    public function setAnalyse(?Analyse $analyse): static
    {
        $this->analyse = $analyse;

        return $this;
    }

    public function getExamen(): ?Examen
    {
        return $this->examen;
    }

    public function setExamen(?Examen $examen): static
    {
        $this->examen = $examen;

        return $this;
    }
}
