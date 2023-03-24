<?php

namespace App\Twig\Runtime;

use App\Repository\PistesRepository;
use Doctrine\Common\Collections\Collection;
use Twig\Extension\RuntimeExtensionInterface;

class RestaurantRuntime implements RuntimeExtensionInterface
{
    private $pistesRepository;

    public function __construct(PistesRepository $pistesRepository)
    {
        $this->pistesRepository = $pistesRepository;
    }

    public function getRestaurants(int $piste_id): array
    {
        return $this->pistesRepository->find($piste_id)->getRestaurants()->toArray();
    }
}
