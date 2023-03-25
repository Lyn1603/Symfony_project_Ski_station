<?php

namespace App\Entity;

use App\Repository\PistesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PistesRepository::class)]
class Pistes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?float $length = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $open_at = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $close_at = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLength(): ?float
    {
        return $this->length;
    }

    public function setLength(float $length): self
    {
        $this->length = $length;

        return $this;
    }

    public function getOpenAt(): ?\DateTimeInterface
    {
        return $this->open_at;
    }

    public function setOpenAt(\DateTimeInterface $open_at): self
    {
        $this->open_at = $open_at;

        return $this;
    }

    public function getCloseAt(): ?\DateTimeInterface
    {
        return $this->close_at;
    }

    public function setCloseAt(\DateTimeInterface $close_at): self
    {
        $this->close_at = $close_at;

        return $this;
    }
}
