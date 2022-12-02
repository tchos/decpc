<?php

namespace App\Entity;

use App\Repository\PerceptionsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PerceptionsRepository::class)]
class Perceptions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libellePerception = null;

    #[ORM\ManyToOne(inversedBy: 'perceptions')]
    private ?RecettesFinances $recetteFinance = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibellePerception(): ?string
    {
        return $this->libellePerception;
    }

    public function setLibellePerception(string $libellePerception): self
    {
        $this->libellePerception = $libellePerception;

        return $this;
    }

    public function getRecetteFinance(): ?RecettesFinances
    {
        return $this->recetteFinance;
    }

    public function setRecetteFinance(?RecettesFinances $recetteFinance): self
    {
        $this->recetteFinance = $recetteFinance;

        return $this;
    }
}
