<?php

namespace App\Services;

use App\Helpers\CurlResponseHelper;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Arr;
use App\Http\Resources\Github\{
    SearchIssueResource,
    FindIssueResource,
};

class GithubService extends Service
{
    protected $http;
    protected $baseUrl;

    public function __construct(Http $http)
    {
        $this->http = $http::withToken(config('github.personal_token'));
        $this->baseUrl = config('github.api_url');
    }

    public function getIssues(array $request)
    {
        $query = Arr::query($request);
        $response = $this->http->get("{$this->baseUrl}/issues?{$query}");
        $items = CurlResponseHelper::handler($response);

        return SearchIssueResource::collection($items);
    }

    public function findIssue(array $request)
    {
        $id = Arr::get($request, 'id');
        $response = $this->http->get("{$this->baseUrl}/repos/{$request['owner']}/{$request['repository']}/issues/{$id}");
        $item = CurlResponseHelper::handler($response);

        return new FindIssueResource($item);
    }

    public function getUserInfo()
    {
        $response = $this->http->get("{$this->baseUrl}/user");
        $item = CurlResponseHelper::handler($response);

        return response()->json($item);
    }
}