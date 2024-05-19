<?php

namespace App\Helpers;

use Illuminate\Http\Request;

class CookieHelper
{
    public static function get(Request $request)
    {
        $token = $request->cookie('_token');

        if (!$token) return false;

        return decrypt($token);
    }

    public static function set(array $token, string $expiration)
    {
        return cookie(
            '_token', // name
            encrypt($token), // value
            $expiration,
            '/', // path
            config('session.domain'), // domain
            config('app.env') != 'local', // secure,
            true, // httpOnly
        );
    }
}