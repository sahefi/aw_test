<?php

namespace App\Actions;

use Lorisleiva\Actions\Concerns\AsAction;
use Inertia\Inertia;
use Inertia\Response;

class ShowWeatherSearch
{
    use AsAction;

    public function asController(): Response
    {
        return Inertia::render('Weather/Search');
    }
}
