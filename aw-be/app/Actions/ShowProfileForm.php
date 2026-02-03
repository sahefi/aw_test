<?php

namespace App\Actions;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Lorisleiva\Actions\Concerns\AsAction;

class ShowProfileForm
{
    use AsAction;

    public function asController(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }
}
