<?php

namespace App\Entity;

use App\Repository\TresoreriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TresoreriesRepository::class)]
class Tresoreries
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelleTG = null;

    #[ORM\ManyToOne(inversedBy: 'tresoreries')]
    private ?Circonscriptions $circonscription = null;

    #[ORM\OneToMany(mappedBy: 'tg', targetEntity: RecettesFinances::class)]
    private Collection $recettesFinances;

    public function __construct()
    {
        $this->recettesFinances = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleTG(): ?string
    {
        return $this->libelleTG;
    }

    public function setLibelleTG(string $libelleTG): self
    {
        $this->libelleTG = $libelleTG;

        return $this;
    }

    public function getCirconscription(): ?Circonscriptions
    {
        return $this->circonscription;
    }

    public function setCirconscription(?Circonscriptions $circonscription): self
    {
        $this->circonscription = $circonscription;

        return $this;
    }

    /**
     * @return Collection<int, RecettesFinances>
     */
    public function getRecettesFinances(): Collection
    {
        return $this->recettesFinances;
    }

    public function addRecettesFinance(RecettesFinances $recettesFinance): self
    {
        if (!$this->recettesFinances->contains($recettesFinance)) {
            $this->recettesFinances->add($recettesFinance);
            $recettesFinance->setTg($this);
        }

        return $this;
    }

    public function removeRecettesFinance(RecettesFinances $recettesFinance): self
    {
        if ($this->recettesFinances->removeElement($recettesFinance)) {
            // set the owning side to null (unless already changed)
            if ($recettesFinance->getTg() === $this) {
                $recettesFinance->setTg(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->libelleTG;
    }
}
