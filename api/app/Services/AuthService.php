<?php

namespace App\Services;

use App\Helpers\CookieHelper;
use App\Repositories\AuthRepository;
use Exception;

class AuthService extends Service
{
    public function __construct(AuthRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getClientToken(array $request)
    {
        try {
            $token = $this->repository->generateClientToken($request);
            $cookie = CookieHelper::set($token, config('auth.access_token_expiration'));
            return response()->json($token)->cookie($cookie);
        } catch (Exception $e) {
            logger()->error($e->getMessage());
            logger()->error($e->getTraceAsString());
            throw $e;
        }
    }
}