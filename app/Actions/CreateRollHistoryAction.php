<?php

namespace App\Actions;

use App\Events\RollingEvent;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CreateRollHistoryAction
{
    public function run(RollingEvent $event, User $user)
    {
        $user->rollHistory()->create([
            'user_id' => Auth::id(),
            'number' => $event->generator->getNumber(),
            'reward' => $event->generator->getReward(),
        ]);
    }
}
