<?php

namespace App\Entity;

use App\Enum\CapacityEnum;
use App\Enum\TransmissionTypeEnum;
use App\Repository\VoitureRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: VoitureRepository::class)]
class Voiture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank()]
    #[Assert\Length(min: 2, max: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank()]
    #[Assert\Length(min: 10, max: 1000)]
    private ?string $description = null;

    #[ORM\Column]
    #[Assert\NotBlank()]
    #[Assert\Positive()]
    private ?float $mensualPrice = null;

    #[ORM\Column]
    #[Assert\NotBlank()]
    #[Assert\Positive()]
    private ?float $dailyPrice = null;

    #[ORM\Column]
    private ?CapacityEnum $placesCapacity = null;

    #[ORM\Column(length: 255)]
    private ?TransmissionTypeEnum $transmissionType = null;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getMensualPrice(): ?float
    {
        return $this->mensualPrice;
    }

    public function setMensualPrice(float $mensualPrice): static
    {
        $this->mensualPrice = $mensualPrice;

        return $this;
    }

    public function getDailyPrice(): ?float
    {
        return $this->dailyPrice;
    }

    public function setDailyPrice(float $dailyPrice): static
    {
        $this->dailyPrice = $dailyPrice;

        return $this;
    }

    public function getPlacesCapacity(): ?CapacityEnum
    {
        return $this->placesCapacity;
    }

    public function setPlacesCapacity(CapacityEnum $placesCapacity): static
    {
        $this->placesCapacity = $placesCapacity;

        return $this;
    }

    public function getTransmissionType(): ?TransmissionTypeEnum
    {
        return $this->transmissionType;
    }

    public function setTransmissionType(TransmissionTypeEnum $transmissionType): static
    {
        $this->transmissionType = $transmissionType;

        return $this;
    }
}
