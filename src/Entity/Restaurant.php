<?php

namespace App\Entity;

use App\Repository\RestaurantRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RestaurantRepository::class)]
class Restaurant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $image_path = null;

    #[ORM\Column]
    private ?int $total_stars = null;

    #[ORM\Column]
    private ?int $star_vote_count = null;

    #[ORM\ManyToOne(inversedBy: 'restaurants')]
    private ?Pistes $piste = null;

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
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImagePath(): ?string
    {
        return $this->image_path;
    }

    public function setImagePath(string $image_path): self
    {
        $this->image_path = $image_path;

        return $this;
    }

    public function getTotalStars(): ?int
    {
        return $this->total_stars;
    }

    public function setTotalStars(int $total_stars): self
    {
        $this->total_stars = $total_stars;

        return $this;
    }

    public function getStarVoteCount(): ?int
    {
        return $this->star_vote_count;
    }

    public function setStarVoteCount(int $star_vote_count): self
    {
        $this->star_vote_count = $star_vote_count;

        return $this;
    }

    public function getPiste(): ?Pistes
    {
        return $this->piste;
    }

    public function setPiste(?Pistes $piste): self
    {
        $this->piste = $piste;

        return $this;
    }

    public function getStars(): float
    {
        return $this->total_stars / $this->star_vote_count; 
    }
}
