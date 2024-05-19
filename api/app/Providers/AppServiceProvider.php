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
        $accessTokenExpiration = config('auth.access_token_expiration');
        $refreshTokenExpiration = config('auth.refresh_token_expiration');
        Passport::tokensExpireIn(now()->addMinutes($accessTokenExpiration));
        Passport::refreshTokensExpireIn(now()->addMinutes($refreshTokenExpiration));
    }
}
