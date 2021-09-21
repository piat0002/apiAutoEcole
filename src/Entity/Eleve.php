<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\EleveRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=EleveRepository::class)
 */
#[ApiResource(normalizationContext: ['groups' => ['eleve']])]
class Eleve
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"eleve"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"eleve"})
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"eleve"})
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"eleve"})
     */
    private $rue;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"eleve"})
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"eleve"})
     */
    private $cp;

    /**
     * @ORM\Column(type="time")
     * @Groups({"eleve"})
     */
    private $birthdate;

    /**
     * @ORM\OneToMany(targetEntity=NoteExam::class, mappedBy="eleve")
     * @Groups({"eleve"})
     */
    private $noteExams;

    /**
     * @ORM\OneToMany(targetEntity=Note::class, mappedBy="eleve")
     */
    private $notes;

    public function __construct()
    {
        $this->noteExams = new ArrayCollection();
        $this->notes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getRue(): ?string
    {
        return $this->rue;
    }

    public function setRue(string $rue): self
    {
        $this->rue = $rue;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCp(): ?string
    {
        return $this->cp;
    }

    public function setCp(string $cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    public function getBirthdate(): ?\DateTimeInterface
    {
        return $this->birthdate;
    }

    public function setBirthdate(\DateTimeInterface $birthdate): self
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * @return Collection|noteExam[]
     */
    public function getNoteExams(): Collection
    {
        return $this->noteExams;
    }

    public function addNoteExam(noteExam $noteExam): self
    {
        if (!$this->noteExams->contains($noteExam)) {
            $this->noteExams[] = $noteExam;
            $noteExam->setEleve($this);
        }

        return $this;
    }

    public function removeNoteExam(noteExam $noteExam): self
    {
        if ($this->noteExams->removeElement($noteExam)) {
            // set the owning side to null (unless already changed)
            if ($noteExam->getEleve() === $this) {
                $noteExam->setEleve(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Note[]
     */
    public function getNotes(): Collection
    {
        return $this->notes;
    }

    public function addNote(Note $note): self
    {
        if (!$this->notes->contains($note)) {
            $this->notes[] = $note;
            $note->setEleve($this);
        }

        return $this;
    }

    public function removeNote(Note $note): self
    {
        if ($this->notes->removeElement($note)) {
            // set the owning side to null (unless already changed)
            if ($note->getEleve() === $this) {
                $note->setEleve(null);
            }
        }

        return $this;
    }
}
