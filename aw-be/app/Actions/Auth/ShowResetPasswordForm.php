<?php

namespace App\Actions\Auth;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Lorisleiva\Actions\Concerns\AsAction;

class ShowResetPasswordForm
{
    use AsAction;

    public function asController(Request $request): View
    {
        return view('auth.reset-password', ['request' => $request]);
    }
}
