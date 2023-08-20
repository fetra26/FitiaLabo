<?php

namespace App\Entity;

use App\Repository\ExamenRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExamenRepository::class)]
class Examen
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateExamen = null;

    #[ORM\Column(length: 255)]
    private ?string $prescripteur = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $rc = null;

    #[ORM\ManyToOne(inversedBy: 'examens')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Patient $patient = null;

    #[ORM\ManyToOne(inversedBy: 'examens')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Laboratoire $laboratoire = null;

    #[ORM\OneToMany(mappedBy: 'examen', targetEntity: Resultat::class)]
    private Collection $resultats;

    #[ORM\OneToMany(mappedBy: 'examen', targetEntity: ExamenAnalyse::class)]
    private Collection $examenAnalyses;

    public function __construct()
    {
        $this->resultats = new ArrayCollection();
        $this->examenAnalyses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateExamen(): ?\DateTimeInterface
    {
        return $this->dateExamen;
    }

    public function setDateExamen(\DateTimeInterface $dateExamen): static
    {
        $this->dateExamen = $dateExamen;

        return $this;
    }

    public function getPrescripteur(): ?string
    {
        return $this->prescripteur;
    }

    public function setPrescripteur(string $prescripteur): static
    {
        $this->prescripteur = $prescripteur;

        return $this;
    }

    public function getRc(): ?string
    {
        return $this->rc;
    }

    public function setRc(?string $rc): static
    {
        $this->rc = $rc;

        return $this;
    }

    public function getPatient(): ?Patient
    {
        return $this->patient;
    }

    public function setPatient(?Patient $patient): static
    {
        $this->patient = $patient;

        return $this;
    }

    public function getLaboratoire(): ?Laboratoire
    {
        return $this->laboratoire;
    }

    public function setLaboratoire(?Laboratoire $laboratoire): static
    {
        $this->laboratoire = $laboratoire;

        return $this;
    }

    /**
     * @return Collection<int, Resultat>
     */
    public function getResultats(): Collection
    {
        return $this->resultats;
    }

    public function addResultat(Resultat $resultat): static
    {
        if (!$this->resultats->contains($resultat)) {
            $this->resultats->add($resultat);
            $resultat->setExamen($this);
        }

        return $this;
    }

    public function removeResultat(Resultat $resultat): static
    {
        if ($this->resultats->removeElement($resultat)) {
            // set the owning side to null (unless already changed)
            if ($resultat->getExamen() === $this) {
                $resultat->setExamen(null);
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
            $examenAnalysis->setExamen($this);
        }

        return $this;
    }

    public function removeExamenAnalysis(ExamenAnalyse $examenAnalysis): static
    {
        if ($this->examenAnalyses->removeElement($examenAnalysis)) {
            // set the owning side to null (unless already changed)
            if ($examenAnalysis->getExamen() === $this) {
                $examenAnalysis->setExamen(null);
            }
        }

        return $this;
    }
}
