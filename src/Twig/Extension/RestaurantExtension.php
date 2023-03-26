<?php

namespace App\Twig\Extension;

use App\Twig\Runtime\RestaurantRuntime;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class RestaurantExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('getRestaurants', [RestaurantRuntime::class, 'getRestaurants']),
        ];
    }
}
