<?php

namespace App\Entity;

use App\Repository\FloorRepository;
use BcMath\Number;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FloorRepository::class)]
class Floor
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::INTEGER)]
    private ?int $floorNumber = null;

    #[ORM\ManyToOne(inversedBy: 'floors')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Building $building = null;

    /**
     * @var Collection<int, Room>
     */
    #[ORM\OneToMany(targetEntity: Room::class, mappedBy: 'floor')]
    private Collection $rooms;

    public function __construct()
    {
        $this->rooms = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFloorNumber(): ?Number
    {
        return $this->floorNumber;
    }

    public function setFloorNumber(int $floorNumber): static
    {
        $this->floorNumber = $floorNumber;

        return $this;
    }

    public function getBuilding(): ?Building
    {
        return $this->building;
    }

    public function setBuilding(?Building $building): static
    {
        $this->building = $building;

        return $this;
    }

    /**
     * @return Collection<int, Room>
     */
    public function getRooms(): Collection
    {
        return $this->rooms;
    }

    public function addRoom(Room $room): static
    {
        if (!$this->rooms->contains($room)) {
            $this->rooms->add($room);
            $room->setFloor($this);
        }

        return $this;
    }

    public function removeRoom(Room $room): static
    {
        if ($this->rooms->removeElement($room)) {
            // set the owning side to null (unless already changed)
            if ($room->getFloor() === $this) {
                $room->setFloor(null);
            }
        }

        return $this;
    }
}
