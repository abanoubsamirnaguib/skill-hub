<?php

namespace App\Providers;

use App\Providers\abanoub;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class abanoubNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  abanoub  $event
     * @return void
     */
    public function handle(abanoub $event)
    {
        //
    }
}
