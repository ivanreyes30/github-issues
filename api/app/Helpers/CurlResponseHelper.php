<?php

namespace App\Helpers;

use Illuminate\Http\Client\Response;

class CurlResponseHelper
{
    public static function handler(Response $response)
    {
        switch ($response->status()) {
            case 200:
                return json_decode($response->body(), true);;
                break;
            default:
                abort($response->status(), $response->body());
        }
    }
}