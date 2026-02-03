<?php

namespace App\Actions;

use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SearchWeather
{
    use AsAction;

    public function asController(Request $request): RedirectResponse
    {
        $request->validate([
            'city' => 'required|string|max:255',
        ]);

        $city = $request->input('city');

        try {
            $weatherData = FetchWeatherData::run($city);
            StoreWeatherData::run($weatherData);

            return redirect()->route('weather.search')->with('weather', $weatherData);
        } catch (\Exception $e) {
            return redirect()->route('weather.search')->with('error', 'Unable to fetch weather data for ' . $city);
        }
    }
}
