<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Auth\TokenRequest;
use App\Services\{
    AuthService,
    GithubService,
};

class AuthController extends Controller
{
    protected $githubService;

    public function __construct(
        AuthService $service,
        GithubService $githubService
    ) {
        $this->service = $service;
        $this->githubService = $githubService;
    }

    public function verifyClientCredentials()
    {
        /**
         * Client Credentials already verified in middleware.
         * If the token valid, return the github user info.
         */
        return $this->githubService->getUserInfo();
    }

    public function clientCredentials(TokenRequest $request)
    {
        $request = $request->validated();

        return $this->service->getClientToken($request);
    }
}
