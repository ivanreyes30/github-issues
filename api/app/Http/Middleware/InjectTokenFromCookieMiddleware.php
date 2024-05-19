<?php

namespace App\Http\Middleware;

use Closure;
use App\Helpers\CookieHelper;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InjectTokenFromCookieMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = CookieHelper::get($request);

        if ($token) {
            $request->headers->set('Authorization', "{$token['token_type']} {$token['access_token']}");
        }
        
        return $next($request);
    }
}
