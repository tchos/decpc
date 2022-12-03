<?php

namespace App\Entity;

use App\Repository\EquipeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EquipeRepository::class)]
class Equipe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelleEquipe = null;

    #[ORM\Column(length: 255)]
    private ?string $chefEquipe = null;

    #[ORM\OneToMany(mappedBy: 'equipe', targetEntity: Utilisateurs::class)]
    private Collection $utilisateurs;

    #[ORM\OneToMany(mappedBy: 'equipe', targetEntity: Circonscriptions::class)]
    private Collection $circonscriptions;

    public function __construct()
    {
        $this->utilisateurs = new ArrayCollection();
        $this->circonscriptions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleEquipe(): ?string
    {
        return $this->libelleEquipe;
    }

    public function setLibelleEquipe(string $libelleEquipe): self
    {
        $this->libelleEquipe = $libelleEquipe;

        return $this;
    }

    public function getChefEquipe(): ?string
    {
        return $this->chefEquipe;
    }

    public function setChefEquipe(string $chefEquipe): self
    {
        $this->chefEquipe = $chefEquipe;

        return $this;
    }

    /**
     * @return Collection<int, Utilisateurs>
     */
    public function getUtilisateurs(): Collection
    {
        return $this->utilisateurs;
    }

    public function addUtilisateur(Utilisateurs $utilisateur): self
    {
        if (!$this->utilisateurs->contains($utilisateur)) {
            $this->utilisateurs->add($utilisateur);
            $utilisateur->setEquipe($this);
        }

        return $this;
    }

    public function removeUtilisateur(Utilisateurs $utilisateur): self
    {
        if ($this->utilisateurs->removeElement($utilisateur)) {
            // set the owning side to null (unless already changed)
            if ($utilisateur->getEquipe() === $this) {
                $utilisateur->setEquipe(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Circonscriptions>
     */
    public function getCirconscriptions(): Collection
    {
        return $this->circonscriptions;
    }

    public function addCirconscription(Circonscriptions $circonscription): self
    {
        if (!$this->circonscriptions->contains($circonscription)) {
            $this->circonscriptions->add($circonscription);
            $circonscription->setEquipe($this);
        }

        return $this;
    }

    public function removeCirconscription(Circonscriptions $circonscription): self
    {
        if ($this->circonscriptions->removeElement($circonscription)) {
            // set the owning side to null (unless already changed)
            if ($circonscription->getEquipe() === $this) {
                $circonscription->setEquipe(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->libelleEquipe;
    }
}
