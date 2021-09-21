<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\SerieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SerieRepository::class)
 */
#[ApiResource]
class Serie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * 
     */
    private $numero;


    /**
     * @ORM\OneToMany(targetEntity=Seance::class, mappedBy="serie")
     * 
     */
    private $seances;

    /**
     * @ORM\ManyToOne(targetEntity=Cd::class, inversedBy="series")
     * 
     * 
     */
    private $cd;

    /**
     * @ORM\OneToMany(targetEntity=Ordre::class, mappedBy="serie")
     * 
     */
    private $ordres;

    public function __construct()
    {
        $this->seances = new ArrayCollection();
        $this->ordres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): self
    {
        $this->numero = $numero;

        return $this;
    }



    /**
     * @return Collection|Seance[]
     */
    public function getSeances(): Collection
    {
        return $this->seances;
    }

    public function addSeance(Seance $seance): self
    {
        if (!$this->seances->contains($seance)) {
            $this->seances[] = $seance;
            $seance->setSerie($this);
        }

        return $this;
    }

    public function removeSeance(Seance $seance): self
    {
        if ($this->seances->removeElement($seance)) {
            // set the owning side to null (unless already changed)
            if ($seance->getSerie() === $this) {
                $seance->setSerie(null);
            }
        }

        return $this;
    }

    public function getCd(): ?Cd
    {
        return $this->cd;
    }

    public function setCd(?Cd $cd): self
    {
        $this->cd = $cd;

        return $this;
    }

    /**
     * @return Collection|Ordre[]
     */
    public function getOrdres(): Collection
    {
        return $this->ordres;
    }

    public function addOrdre(Ordre $ordre): self
    {
        if (!$this->ordres->contains($ordre)) {
            $this->ordres[] = $ordre;
            $ordre->setSerie($this);
        }

        return $this;
    }

    public function removeOrdre(Ordre $ordre): self
    {
        if ($this->ordres->removeElement($ordre)) {
            // set the owning side to null (unless already changed)
            if ($ordre->getSerie() === $this) {
                $ordre->setSerie(null);
            }
        }

        return $this;
    }
}
