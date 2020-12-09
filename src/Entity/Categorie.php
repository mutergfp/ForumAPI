<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiProperty;
use App\Repository\CategorieRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ApiResource
 * @ORM\Entity(repositoryClass=CategorieRepository::class)
 * 
 */

class Categorie
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
     * @ORM\OneToMany(targetEntity="Sujet", mappedBy="categorie", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true, onDelete="CASCADE")
     */
    private $sujets;

    public function __construct($nom){
        $this->nom = $nom;
        $this->sujets = new ArrayCollection();
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

    public function getSujets() : ?Collection
    {
        return $this->sujets;
    }

    public function addSujet(Sujet $sujet): void
    {
        $sujet->setCategorie($this);
        $this->sujets->add($sujet);
    }

    public function removeSujet(Sujet $sujet): void
    {
        $sujet->setCategorie(null);
        $this->sujets->removeElement($sujet);
    }
}
