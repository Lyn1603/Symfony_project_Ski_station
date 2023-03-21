<?php

namespace App\Twig\Extension;

use App\Twig\Runtime\WeatherRuntime;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class WeatherExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('getForecast', [WeatherRuntime::class, 'getForecast']),
        ];
    }
}
