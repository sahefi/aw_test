<?php

namespace App\Actions\Auth;

use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\View\View;

class ShowLoginForm
{
    use AsAction;

    public function asController(): View
    {
        return view('auth.login');
    }
}
