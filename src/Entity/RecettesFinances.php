<?php

namespace App\Entity;

use App\Repository\RecettesFinancesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecettesFinancesRepository::class)]
class RecettesFinances
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelleRecette = null;

    #[ORM\ManyToOne(inversedBy: 'recettesFinances')]
    private ?Tresoreries $tg = null;

    #[ORM\OneToMany(mappedBy: 'recetteFinance', targetEntity: Perceptions::class)]
    private Collection $perceptions;

    public function __construct()
    {
        $this->perceptions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleRecette(): ?string
    {
        return $this->libelleRecette;
    }

    public function setLibelleRecette(string $libelleRecette): self
    {
        $this->libelleRecette = $libelleRecette;

        return $this;
    }

    public function getTg(): ?Tresoreries
    {
        return $this->tg;
    }

    public function setTg(?Tresoreries $tg): self
    {
        $this->tg = $tg;

        return $this;
    }

    /**
     * @return Collection<int, Perceptions>
     */
    public function getPerceptions(): Collection
    {
        return $this->perceptions;
    }

    public function addPerception(Perceptions $perception): self
    {
        if (!$this->perceptions->contains($perception)) {
            $this->perceptions->add($perception);
            $perception->setRecetteFinance($this);
        }

        return $this;
    }

    public function removePerception(Perceptions $perception): self
    {
        if ($this->perceptions->removeElement($perception)) {
            // set the owning side to null (unless already changed)
            if ($perception->getRecetteFinance() === $this) {
                $perception->setRecetteFinance(null);
            }
        }

        return $this;
    }
}
