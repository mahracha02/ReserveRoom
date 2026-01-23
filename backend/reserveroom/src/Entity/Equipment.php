<?php

namespace App\Entity;

use App\Repository\EquipmentRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Enum\EquipmentType;

#[ORM\Entity(repositoryClass: EquipmentRepository::class)]
class Equipment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $equipmentName = null;

    #[ORM\Column(enumType: EquipmentType::class)]
    private ?EquipmentType $type = null;

    #[ORM\Column]
    private ?int $quantity = null;

     public function __construct()
    {
        $this->type = EquipmentType::OTHER;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEquipmentName(): ?string
    {
        return $this->equipmentName;
    }

    public function setEquipmentName(string $equipmentName): static
    {
        $this->equipmentName = $equipmentName;

        return $this;
    }

    public function getType(): ?EquipmentType
    {
        return $this->type;
    }

    public function setType(EquipmentType $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }
}
