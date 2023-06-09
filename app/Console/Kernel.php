<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }

    // protected $routeMiddleware = [
    //     'auth'          => \Illuminate\Auth\Middleware\Authenticate::class,
    //     'auth.basic'    => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
    //     'bindings'      => \Illuminate\Routing\Middleware\SubstituteBindings::class,
    //     'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
    //     'can'           => \Illuminate\Auth\Middleware\Authorize::class,
    //     'guest'         => \App\Http\Middleware\RedirectIfAuthenticated::class,
    //     'signed'        => \Illuminate\Routing\Middleware\ValidateSignature::class,
    //     'throttle'      => \Illuminate\Routing\Middleware\ThrottleRequests::class,
    //     'cors'          => \App\Http\Middleware\Cors::class, // added
    // ];
}
