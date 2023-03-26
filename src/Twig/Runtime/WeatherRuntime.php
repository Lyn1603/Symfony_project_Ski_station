<?php

namespace App\Twig\Runtime;

use App\Service\WeatherService;
use Twig\Extension\RuntimeExtensionInterface;

class WeatherRuntime implements RuntimeExtensionInterface
{
    private $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService; 
    }

    public function getForecast(string $location)
    {
        return $this->weatherService->getForecast($location);
    }
}
