<?php

namespace App\Entity;

use App\Repository\PersonneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonneRepository::class)]
class Personne
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $nom = null;

    #[ORM\Column(length: 30)]
    private ?string $prenom = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateNaiss = null;

    #[ORM\OneToOne(inversedBy: 'personne', cascade: ['persist', 'remove'])]
    private ?Adresse $adresse = null;

    #[ORM\ManyToMany(targetEntity: Livre::class, cascade: ['persist', 'remove'])]
    private Collection $livre;

    #[ORM\OneToMany(mappedBy: 'personne', targetEntity: AchatProduits::class, cascade: ['persist', 'remove'])]
    private Collection $achatProduits;

    public function __construct()
    {
        $this->livre = new ArrayCollection();
        $this->achatProduits = new ArrayCollection();
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

    public function getDateNaiss(): ?\DateTimeInterface
    {
        return $this->dateNaiss;
    }

    public function setDateNaiss(?\DateTimeInterface $dateNaiss): self
    {
        $this->dateNaiss = $dateNaiss;

        return $this;
    }

    public function getAdresse(): ?Adresse
    {
        return $this->adresse;
    }

    public function setAdresse(?Adresse $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * @return Collection<int, Livre>
     */
    public function getLivre(): Collection
    {
        return $this->livre;
    }

    public function addLivre(Livre $livre): self
    {
        if (!$this->livre->contains($livre)) {
            $this->livre->add($livre);
        }

        return $this;
    }

    public function removeLivre(Livre $livre): self
    {
        $this->livre->removeElement($livre);

        return $this;
    }

    /**
     * @return Collection<int, AchatProduits>
     */
    public function getAchatProduits(): Collection
    {
        return $this->achatProduits;
    }

    public function addAchatProduit(AchatProduits $achatProduit): self
    {
        if (!$this->achatProduits->contains($achatProduit)) {
            $this->achatProduits->add($achatProduit);
            $achatProduit->setPersonne($this);
        }

        return $this;
    }

    public function removeAchatProduit(AchatProduits $achatProduit): self
    {
        if ($this->achatProduits->removeElement($achatProduit)) {
            // set the owning side to null (unless already changed)
            if ($achatProduit->getPersonne() === $this) {
                $achatProduit->setPersonne(null);
            }
        }

        return $this;
    }
}