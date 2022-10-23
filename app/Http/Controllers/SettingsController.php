<?php

namespace App\Http\Controllers;

use App\Actions\UpdateSecureKeyAction;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function generateLink(Request $request, UpdateSecureKeyAction $secureKeyAction)
    {
        $secureKeyAction(Auth::user(), $request->_token);

        return view('game.index');
    }

    public function refreshLink(Request $request, UpdateSecureKeyAction $secureKeyAction)
    {
        $secureKeyAction(Auth::user(), $request->_token);

        return redirect(route('game.index'));
    }

    public function deactivate()
    {
        Auth::user()->update([
            'isActive' => false,
        ]);

        Auth::logout();

        return redirect(RouteServiceProvider::HOME);
    }
}
