<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\DateExamRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DateExamRepository::class)
 */
#[ApiResource]
class DateExam
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\OneToMany(targetEntity=noteExam::class, mappedBy="dateExam")
     */
    private $notesexams;

    public function __construct()
    {
        $this->notesexams = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return Collection|noteExam[]
     */
    public function getNotesexam(): Collection
    {
        return $this->notesexams;
    }

    public function addNotesexam(noteExam $notesexam): self
    {
        if (!$this->notesexams->contains($notesexams)) {
            $this->notesexams[] = $notesexams;
            $notesexams->setDateExam($this);
        }

        return $this;
    }

    public function removeNotesexam(noteExam $notesexams): self
    {
        if ($this->notesexams->removeElement($notesexams)) {
            // set the owning side to null (unless already changed)
            if ($notesexams->getDateExam() === $this) {
                $notesexams->setDateExam(null);
            }
        }

        return $this;
    }
}
