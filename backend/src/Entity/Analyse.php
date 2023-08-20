<?php

namespace App\Entity;

use App\Repository\AnalyseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnalyseRepository::class)]
class Analyse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\OneToMany(mappedBy: 'analyse', targetEntity: MatiereBio::class)]
    private Collection $matiereBio;

    #[ORM\OneToMany(mappedBy: 'analyse', targetEntity: ExamenAnalyse::class)]
    private Collection $examenAnalyses;

    public function __construct()
    {
        $this->matiereBio = new ArrayCollection();
        $this->examenAnalyses = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, MatiereBio>
     */
    public function getMatiereBio(): Collection
    {
        return $this->matiereBio;
    }

    public function addMatiereBio(MatiereBio $matiereBio): static
    {
        if (!$this->matiereBio->contains($matiereBio)) {
            $this->matiereBio->add($matiereBio);
            $matiereBio->setAnalyse($this);
        }

        return $this;
    }

    public function removeMatiereBio(MatiereBio $matiereBio): static
    {
        if ($this->matiereBio->removeElement($matiereBio)) {
            // set the owning side to null (unless already changed)
            if ($matiereBio->getAnalyse() === $this) {
                $matiereBio->setAnalyse(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ExamenAnalyse>
     */
    public function getExamenAnalyses(): Collection
    {
        return $this->examenAnalyses;
    }

    public function addExamenAnalysis(ExamenAnalyse $examenAnalysis): static
    {
        if (!$this->examenAnalyses->contains($examenAnalysis)) {
            $this->examenAnalyses->add($examenAnalysis);
            $examenAnalysis->setAnalyse($this);
        }

        return $this;
    }

    public function removeExamenAnalysis(ExamenAnalyse $examenAnalysis): static
    {
        if ($this->examenAnalyses->removeElement($examenAnalysis)) {
            // set the owning side to null (unless already changed)
            if ($examenAnalysis->getAnalyse() === $this) {
                $examenAnalysis->setAnalyse(null);
            }
        }

        return $this;
    }
}
