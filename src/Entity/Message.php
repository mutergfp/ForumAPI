<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiProperty;
use App\Repository\MessageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *  collectionOperations={
 *      "get",
 *      "post"={"security"="is_granted('ROLE_ADMIN') or is_granted('ROLE_USER')"}
 *  },
 *  itemOperations={
 *      "get",
 *      "delete"={"security"="is_granted('ROLE_ADMIN')"},
 *      "put"={"security"="is_granted('ROLE_ADMIN')"},
 *      "patch"={"security"="is_granted('ROLE_ADMIN') or is_granted('ROLE_USER')"},
 *  }
 * )
 * @ORM\Entity(repositoryClass=MessageRepository::class)
 */
class Message
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
     * @ORM\Column(type="text")
     */
    private $contenu;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_creation;

    /**
     * @ORM\ManyToOne(targetEntity=Sujet::class, inversedBy="messages")
     */
    private $sujet;

    /**
     * @ORM\ManyToOne(targetEntity=Auteur::class)
     */
    private $auteur;

    public function __construct($contenu, $auteur){
        $this->contenu = $contenu;
        $this->date_creation = new \DateTime();
        $this->sujet = null;
        $this->auteur = $auteur;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

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

    public function getSujet(): ?Sujet
    {
        return $this->sujet;
    }

    public function setSujet(Sujet $sujet): self
    {
        $this->sujet = $sujet;

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
}
