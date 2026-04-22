<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Event; // Import Event Facade
use Illuminate\Auth\Events\Login;      // Import Login Event
use Illuminate\Auth\Events\Failed;     // Import Failed Event
use App\Listeners\LogLoginActivity;    // Import your Listener

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // --- LOGIN ACTIVITY TRACKING ---
        // Registers listeners for login success and failure
        Event::listen(
            Login::class,
            [LogLoginActivity::class, 'handleLogin']
        );

        Event::listen(
            Failed::class,
            [LogLoginActivity::class, 'handleFailed']
        );


        // --- EXISTING CONTACT COUNT LOGIC ---
        // डेटाबेस टेबल छ कि छैन चेक गरेर मात्र डेटा शेयर गर्ने
        if (Schema::hasTable('contacts')) {
            View::composer('*', function ($view) {
                $view->with('contactCount', DB::table('contacts')->count());
            });
        } else {
            // यदि टेबल छैन भने डिफल्ट ० पठाउने
            View::share('contactCount', 0);
        }
    }
}