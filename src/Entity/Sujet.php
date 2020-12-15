<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiProperty;
use App\Repository\SujetRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ApiResource
 * @ORM\Entity(repositoryClass=SujetRepository::class)
 */
class Sujet
{

    /**
     * @var int 
     * 
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @ApiProperty(identifier=true)
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_creation;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="sujets")
     */
    private $categorie;

    /**
     * @ORM\ManyToOne(targetEntity=Auteur::class)
     */
    private $auteur;

    /**
     * @ORM\OneToMany(targetEntity="Message", mappedBy="sujet", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true, onDelete="CASCADE")
     */
    private $messages;

    public function __construct($nom, $auteur){
        $this->nom = $nom;
        $this->date_creation = new \DateTime();
        $this->categorie = null;
        $this->auteur = $auteur;
        $this->messages = new ArrayCollection();
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

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->date_creation;
    }

    public function setDateCreation(\DateTimeInterface $date_creation): self
    {
        $this->date_creation = $date_creation;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getAuteur(): ?Auteur
    {
        return $this->auteur;
    }

    public function setAuteur(Auteur $auteur): self
    {
        $this->auteur = $auteur;

        return $this;
    }

    public function getMessages() : ?Collection
    {
        return $this->messages;
    }

    public function addMessage(Message $message): void
    {
        $message->setSujet($this);
        $this->messages->add($message);
    }

    public function removeMessage(Message $message): void
    {
        $message->setSujet(null);
        $this->messages->removeElement($message);
    }
}
