<?php

namespace App\Listeners;

use App\Actions\CreateRollHistoryAction;
use App\Events\RollingEvent;
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
     * @param  RollingEvent  $event
     * @return void
     */
    public function handle(RollingEvent $event): void
    {
        $this->historyAction->run($event, Auth::user());
    }
}
