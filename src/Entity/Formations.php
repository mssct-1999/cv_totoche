<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FormationsRepository")
 */
class Formations
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ecole;

    /**
     * @ORM\Column(type="datetime")
     */
    private $anneeDebut;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $anneeFin;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEcole(): ?string
    {
        return $this->ecole;
    }

    public function setEcole(string $ecole): self
    {
        $this->ecole = $ecole;

        return $this;
    }

    public function getAnneeDebut(): ?\DateTimeInterface
    {
        return $this->anneeDebut;
    }

    public function setAnneeDebut(\DateTimeInterface $anneeDebut): self
    {
        $this->anneeDebut = $anneeDebut;

        return $this;
    }

    public function getAnneeFin(): ?\DateTimeInterface
    {
        return $this->anneeFin;
    }

    public function setAnneeFin(?\DateTimeInterface $anneeFin): self
    {
        $this->anneeFin = $anneeFin;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
