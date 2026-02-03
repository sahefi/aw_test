<?php

namespace App\Actions;

use Lorisleiva\Actions\Concerns\AsAction;
use Inertia\Inertia;
use Inertia\Response;

class ShowRegistrationForm
{
    use AsAction;

    public function asController(): Response
    {
        return Inertia::render('Auth/Register');
    }
}
