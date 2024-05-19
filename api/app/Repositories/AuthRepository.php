<?php

namespace App\Repositories;

use App\Helpers\CurlResponseHelper;
use Illuminate\Support\Facades\Http;

class AuthRepository extends Repository
{
    protected $route;

    public function __construct()
    {
        $this->route = sprintf('%s/%s', config('app.host_ip'), 'oauth/token');
    }

    public function generateClientToken(array $request)
    {
        $request['grant_type'] = 'client_credentials';
        $request['scope'] = '*';

        $http = Http::asForm()->post($this->route, $request);

        return CurlResponseHelper::handler($http);
    }
}