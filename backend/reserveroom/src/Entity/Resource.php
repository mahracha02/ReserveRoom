<?php

namespace App\Entity;

use App\Repository\ResourceRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Enum\RessourceType;

#[ORM\Entity(repositoryClass: ResourceRepository::class)]
class Resource
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?bool $isAvailable = null;

    #[ORM\Column(enumType: RessourceType::class)]
    private ?RessourceType $typeEnum = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function isAvailable(): ?bool
    {
        return $this->isAvailable;
    }

    public function setIsAvailable(bool $isAvailable): static
    {
        $this->isAvailable = $isAvailable;

        return $this;
    }

    public function getTypeEnum(): ?RessourceType       
    {
        return $this->typeEnum;
    }

    public function setTypeEnum(RessourceType $typeEnum): static
    {
        $this->typeEnum = $typeEnum;

        return $this;
    }
}
