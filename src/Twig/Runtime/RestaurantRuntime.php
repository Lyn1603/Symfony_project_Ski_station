<?php

namespace App\Twig\Runtime;

use App\Repository\PistesRepository;
use Twig\Extension\RuntimeExtensionInterface;

class RestaurantRuntime implements RuntimeExtensionInterface
{
    private $pistesRepository;

    public function __construct(PistesRepository $pistesRepository)
    {
        $this->pistesRepository = $pistesRepository;
    }

    public function getRestaurants(int $piste_id, array $query): array
    {   
        $order = isset($query['order']) ? $query['order'] : null;
        $restaurants = $this->pistesRepository->find($piste_id)->getRestaurants()->toArray();
        if ($order == 'asc' || $order == 'desc') {
            $restaurants_stars = array();
            foreach ($restaurants as $key => $restaurant)
            {
                $restaurants_stars[$key] = $restaurant->getStars();
            }
            array_multisort($restaurants_stars, $order == 'asc' ? SORT_ASC : SORT_DESC, $restaurants);
        }

        return $restaurants;
    }
}
