<?php

namespace App\Entity;

use App\Repository\CirconscriptionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CirconscriptionsRepository::class)]
class Circonscriptions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelleCirconscription = null;

    #[ORM\OneToMany(mappedBy: 'circonscription', targetEntity: Tresoreries::class)]
    private Collection $tresoreries;

    public function __construct()
    {
        $this->tresoreries = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleCirconscription(): ?string
    {
        return $this->libelleCirconscription;
    }

    public function setLibelleCirconscription(string $libelleCirconscription): self
    {
        $this->libelleCirconscription = $libelleCirconscription;

        return $this;
    }

    /**
     * @return Collection<int, Tresoreries>
     */
    public function getTresoreries(): Collection
    {
        return $this->tresoreries;
    }

    public function addTresorery(Tresoreries $tresorery): self
    {
        if (!$this->tresoreries->contains($tresorery)) {
            $this->tresoreries->add($tresorery);
            $tresorery->setCirconscription($this);
        }

        return $this;
    }

    public function removeTresorery(Tresoreries $tresorery): self
    {
        if ($this->tresoreries->removeElement($tresorery)) {
            // set the owning side to null (unless already changed)
            if ($tresorery->getCirconscription() === $this) {
                $tresorery->setCirconscription(null);
            }
        }

        return $this;
    }
}
