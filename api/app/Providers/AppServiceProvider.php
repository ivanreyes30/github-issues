<?php

namespace App\Providers;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

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
         * Remove Data Wrapping in API Resource.
         */
        JsonResource::withoutWrapping();
        
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
