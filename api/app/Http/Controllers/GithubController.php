<?php

namespace App\Http\Controllers;

use App\Services\GithubService;
use App\Http\Requests\Github\{
    SearchIssueRequest,
    DetailsIssueRequest,
    CommentsIssueRequest,
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

    public function detailsIssue(DetailsIssueRequest $request)
    {
        $request = $request->validated();

        return $this->service->detailsIssue($request);
    }

    public function commentsIssue(CommentsIssueRequest $request)
    {
        $request = $request->validated();

        return $this->service->commentsIssue($request);
    }
}
