<?php

namespace App\Service;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class WeatherService
{
    private $weatherClient;

    public function __construct(HttpClientInterface $weatherClient)
    {
        $this->weatherClient = $weatherClient;
    }


    public function getForecast(string $location): array
    {
        $response = $this->weatherClient->request("GET", "/forecast.json", [
            'query' => [
                'q' => $location,
                'days' => 3,
                'lang' => 'fr'
            ]
        ]);

        $forecast = array_map(function(array $forecastday) {
            $data = $forecastday["day"];
            return [
                "min_temp" => $data["mintemp_c"],
                "avg_temp" => $data["avgtemp_c"],
                "max_temp" => $data["maxtemp_c"],
                "condition" => $data["condition"]["text"],
                "icon" => "https:" . $data["condition"]["icon"],
            ];
        }, $response->toArray()["forecast"]["forecastday"]);

        return $forecast;
    }
}