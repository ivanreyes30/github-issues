<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Auth\TokenRequest;
use App\Services\AuthService;

class AuthController extends Controller
{
    public function __construct(AuthService $service)
    {
        $this->service = $service;
    }

    public function verifyClientCredentials(Request $request)
    {
        /**
         * Client Credentials already verified in middleware.
         * If the token valid, return the request token.
         */
        return response()->json(['_token' => $request->cookie('_token')]);
    }

    public function clientCredentials(TokenRequest $request)
    {
        $request = $request->validated();

        return $this->service->getClientToken($request);
    }
}
