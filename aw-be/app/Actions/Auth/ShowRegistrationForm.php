<?php

namespace App\Actions\Auth;

use Illuminate\View\View;
use Lorisleiva\Actions\Concerns\AsAction;

class ShowRegistrationForm
{
    use AsAction;

    public function asController(): View
    {
        return view('auth.register');
    }
}
