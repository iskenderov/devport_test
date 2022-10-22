<?php

namespace App\Listeners;

use App\Actions\CreateRollHistoryAction;
use App\Events\RollingEvent;
use App\Models\RollHistory;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

class UpdateRollHistoryListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(private readonly CreateRollHistoryAction $historyAction)
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle(RollingEvent $event)
    {
        $this->historyAction->run($event, Auth::user());
    }
}
