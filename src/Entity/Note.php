<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\NoteRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=NoteRepository::class)
 */
#[ApiResource]
class Note
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups("eleve")
     */
    private $note;

    /**
     * @ORM\ManyToOne(targetEntity=Eleve::class, inversedBy="notes")
     */
    private $eleve;

    /**
     * @ORM\ManyToOne(targetEntity=Seance::class, inversedBy="notes")
     * @Groups("eleve")
     */
    private $seance;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(?int $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getEleve(): ?eleve
    {
        return $this->eleve;
    }

    public function setEleve(?eleve $eleve): self
    {
        $this->eleve = $eleve;

        return $this;
    }

    public function getSeance(): ?Seance
    {
        return $this->seance;
    }

    public function setSeance(?Seance $seance): self
    {
        $this->seance = $seance;

        return $this;
    }
}
