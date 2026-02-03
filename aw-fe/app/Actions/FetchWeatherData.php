<?php

namespace App\Actions;

use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Support\Facades\Http;

class FetchWeatherData
{
    use AsAction;

    public function handle(string $city): array
    {
        // Mockup data for different cities
        $mockData = [
            'jakarta' => [
                'city' => 'Jakarta',
                'country' => 'ID',
                'temperature' => 32,
                'description' => 'scattered clouds',
                'icon' => '03d',
                'humidity' => 75,
                'wind_speed' => 3.5,
            ],
            'bandung' => [
                'city' => 'Bandung',
                'country' => 'ID',
                'temperature' => 24,
                'description' => 'light rain',
                'icon' => '10d',
                'humidity' => 80,
                'wind_speed' => 2.8,
            ],
            'surabaya' => [
                'city' => 'Surabaya',
                'country' => 'ID',
                'temperature' => 34,
                'description' => 'clear sky',
                'icon' => '01d',
                'humidity' => 65,
                'wind_speed' => 4.2,
            ],
            'singapore' => [
                'city' => 'Singapore',
                'country' => 'SG',
                'temperature' => 31,
                'description' => 'few clouds',
                'icon' => '02d',
                'humidity' => 70,
                'wind_speed' => 3.1,
            ],
            'tokyo' => [
                'city' => 'Tokyo',
                'country' => 'JP',
                'temperature' => 18,
                'description' => 'overcast clouds',
                'icon' => '04d',
                'humidity' => 55,
                'wind_speed' => 5.5,
            ],
        ];

        $cityKey = strtolower($city);

        if (!isset($mockData[$cityKey])) {
            throw new \Exception('City not found. Please try Jakarta, Bandung, Surabaya, Singapore, or Tokyo.');
        }

        // Simulate API delay
        usleep(800000); // 0.8 seconds

        return $mockData[$cityKey];
    }
}
