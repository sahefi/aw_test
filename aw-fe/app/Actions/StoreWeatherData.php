<?php

namespace App\Actions;

use Lorisleiva\Actions\Concerns\AsAction;
use App\Models\Weather;

class StoreWeatherData
{
    use AsAction;

    public function handle(array $weatherData): Weather
    {
        return Weather::create($weatherData);
    }
}
