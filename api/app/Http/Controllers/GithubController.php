<?php

namespace App\Http\Controllers;

use App\Services\GithubService;
use App\Http\Requests\Github\{
    SearchIssueRequest,
    FindIssueRequest,
};

class GithubController extends Controller
{
    public function __construct(GithubService $service)
    {
        $this->service = $service; 
    }

    public function searchIssues(SearchIssueRequest $request)
    {
        $request = $request->validated();

        return $this->service->getIssues($request);
    }

    public function findIssue(FindIssueRequest $request)
    {
        $request = $request->validated();

        return $this->service->findIssue($request);
    }
}
