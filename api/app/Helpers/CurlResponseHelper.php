<?php

namespace App\Helpers;

use Illuminate\Http\Client\Response;
use Illuminate\Auth\AuthenticationException;

class CurlResponseHelper
{
    public static function handler(Response $response)
    {
        switch ($response->status()) {
            case 200:
                return true;
                break;
            default:
                abort($response->status(), $response->body());
        }
    }
}