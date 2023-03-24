<?php

namespace App\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('restaurant_carousel')]
final class RestaurantCarouselComponent
{
    public string $piste_id;
}
