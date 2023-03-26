<?php

namespace App\Entity;

use App\Repository\StationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StationRepository::class)]
class Station
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $logo = null;

    #[ORM\OneToMany(mappedBy: 'station', targetEntity: Trail::class)]
    private Collection $trails;

    public function __construct()
    {
        $this->trails = new ArrayCollection();
    }

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

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * @return Collection<int, Trail>
     */
    public function getTrails(): Collection
    {
        return $this->trails;
    }

    public function addTrail(Trail $trail): self
    {
        if (!$this->trails->contains($trail)) {
            $this->trails->add($trail);
            $trail->setStation($this);
        }

        return $this;
    }

    public function removeTrail(Trail $trail): self
    {
        if ($this->trails->removeElement($trail)) {
            // set the owning side to null (unless already changed)
            if ($trail->getStation() === $this) {
                $trail->setStation(null);
            }
        }

        return $this;
    }
}
