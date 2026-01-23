<?php

namespace App\Entity;

use App\Repository\BuildingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BuildingRepository::class)]
class Building
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $buildingName = null;

    #[ORM\Column(length: 255)]
    private ?string $section = null;

    #[ORM\Column(length: 255)]
    private ?string $coordinates = null;

    /**
     * @var Collection<int, Floor>
     */
    #[ORM\OneToMany(targetEntity: Floor::class, mappedBy: 'building', orphanRemoval: true)]
    private Collection $floors;

   

    public function __construct()
    {
       
        $this->floors = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBuildingName(): ?string
    {
        return $this->buildingName;
    }

    public function setBuildingName(string $buildingName): static
    {
        $this->buildingName = $buildingName;

        return $this;
    }

    public function getSection(): ?string
    {
        return $this->section;
    }

    public function setSection(string $section): static
    {
        $this->section = $section;

        return $this;
    }

    public function getCoordinates(): ?string
    {
        return $this->coordinates;
    }

    public function setCoordinates(string $coordinates): static
    {
        $this->coordinates = $coordinates;

        return $this;
    }

    /**
     * @return Collection<int, Floor>
     */
    public function getFloors(): Collection
    {
        return $this->floors;
    }

    public function addFloor(Floor $floor): static
    {
        if (!$this->floors->contains($floor)) {
            $this->floors->add($floor);
            $floor->setBuilding($this);
        }

        return $this;
    }

    public function removeFloor(Floor $floor): static
    {
        if ($this->floors->removeElement($floor)) {
            // set the owning side to null (unless already changed)
            if ($floor->getBuilding() === $this) {
                $floor->setBuilding(null);
            }
        }

        return $this;
    }

  
}
