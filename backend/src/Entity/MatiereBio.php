<?php

namespace App\Entity;

use App\Repository\MatiereBioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MatiereBioRepository::class)]
class MatiereBio
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom = null;

    #[ORM\OneToMany(mappedBy: 'matiereBio', targetEntity: ValeurRef::class)]
    private Collection $valeurRefs;

    #[ORM\OneToMany(mappedBy: 'matiereBio', targetEntity: Resultat::class)]
    private Collection $resultats;

    #[ORM\ManyToOne(inversedBy: 'matiereBio')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Analyse $analyse = null;

    public function __construct()
    {
        $this->valeurRefs = new ArrayCollection();
        $this->resultats = new ArrayCollection();
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
     * @return Collection<int, ValeurRef>
     */
    public function getValeurRefs(): Collection
    {
        return $this->valeurRefs;
    }

    public function addValeurRef(ValeurRef $valeurRef): static
    {
        if (!$this->valeurRefs->contains($valeurRef)) {
            $this->valeurRefs->add($valeurRef);
            $valeurRef->setMatiereBio($this);
        }

        return $this;
    }

    public function removeValeurRef(ValeurRef $valeurRef): static
    {
        if ($this->valeurRefs->removeElement($valeurRef)) {
            // set the owning side to null (unless already changed)
            if ($valeurRef->getMatiereBio() === $this) {
                $valeurRef->setMatiereBio(null);
            }
        }

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
            $resultat->setMatiereBio($this);
        }

        return $this;
    }

    public function removeResultat(Resultat $resultat): static
    {
        if ($this->resultats->removeElement($resultat)) {
            // set the owning side to null (unless already changed)
            if ($resultat->getMatiereBio() === $this) {
                $resultat->setMatiereBio(null);
            }
        }

        return $this;
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
}
