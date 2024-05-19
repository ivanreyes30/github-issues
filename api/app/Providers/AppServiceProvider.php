<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

use function Ramsey\Uuid\v1;

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
        /**
         * Passport Configuration.
         */
        Passport::tokensExpireIn(now()->addMinutes(60 * 2));
        Passport::refreshTokensExpireIn(now()->addMinutes(60 * 4));

        /**
         * Passport Configuration For Testing.
         */
        // Passport::tokensExpireIn(now()->addSeconds(10));
        // Passport::refreshTokensExpireIn(now()->addSeconds(60));
    }
}
