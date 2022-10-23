<?php

namespace App\Http\Controllers;

use App\Events\RollingEvent;
use App\Service\History\Enums\HistoryCountEnum;
use App\Service\Reward\Enums\StatusEnum;
use App\Service\Reward\Generator;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public function index()
    {
        return view('game.index');
    }

    public function roll()
    {
        $number = rand(1, 1000);
        $generator = new Generator($number);
        $generator->run();

        event(new RollingEvent($generator));

        if ($generator->getStatus() === StatusEnum::WIN) {
            return view('game.win')->with(['reward' => $generator]);
        }

        return view('game.loose')->with(['reward' => $generator]);
    }

    public function showHistory()
    {
        $history = Auth::user()
            ->rollHistory()
            ->orderByDesc('id')
            ->take(HistoryCountEnum::COUNT->value)
            ->get();

        return view('game.history')->with(['history' => $history]);
    }
}
