<?php

namespace App\Actions;

use Lorisleiva\Actions\Concerns\AsAction;
use App\Models\Weather;

class GetWeatherHistory
{
    use AsAction;

    public function handle(int $limit = 10): \Illuminate\Database\Eloquent\Collection
    {
        return Weather::latest()
            ->take($limit)
            ->get();
    }
}
