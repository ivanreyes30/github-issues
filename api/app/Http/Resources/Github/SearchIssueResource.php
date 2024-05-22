<?php

namespace App\Http\Resources\Github;

use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SearchIssueResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = parent::toArray($request);
        $query = Arr::query(['repository' => Arr::get($data, 'repository.name'), 'owner' => Arr::get($data, 'repository.owner.login')]);
        $number = Arr::get($data, 'number');
        $createdDiff = Carbon::parse(Arr::get($data, 'created_at'))->diffForHumans();
        $timestamp = Carbon::parse(Arr::get($data, 'updated_at'))->format('D, M d, Y, g:ia');

        return [
            'id' => Arr::get($data, 'id'),
            'number' => $number,
            // 'url' => Arr::get($data, 'url'),
            // 'repository_url' => Arr::get($data, 'repository_url'),
            'details_url' => sprintf('%s/api/%s', config('app.url'), "github/issue/{$number}/details?{$query}"),
            'comments_url' => sprintf('%s/api/%s', config('app.url'), "github/issue/{$number}/comments?{$query}"),
            // 'events_url' => Arr::get($data, 'events_url'),
            'title' => Arr::get($data, 'title'),
            'comments' => Arr::get($data, 'comments'),
            'assignee' => [
                'login' => Arr::get($data, 'assignee.login'),
                'id' => Arr::get($data, 'assignee.id'),
                'avatar_url' => Arr::get($data, 'assignee.avatar_url'),
            ],
            'milestone' => [
                'url' => Arr::get($data, 'milestone.url'),
                'id' => Arr::get($data, 'assignee.id'),
                'avatar_url' => Arr::get($data, 'assignee.avatar_url'),
            ],
            'repository' => [
                'name' => Arr::get($data, 'repository.name'),
                'owner' => Arr::get($data, 'repository.owner.login'),
            ],
            'labels' => collect(Arr::get($data, 'labels'))->map(function ($label) {
                return [
                    'id' => Arr::get($label, 'id'),
                    'name' => Arr::get($label, 'name'),
                    'color' => Arr::get($label, 'color'),
                    'description' => Arr::get($label, 'description'),
                ];
            })->toArray(),
            'details_text' => "#{$number} - created {$createdDiff}, $timestamp",
            'created_at' => Carbon::parse(Arr::get($data, 'created_at'))->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::parse(Arr::get($data, 'updated_at'))->format('Y-m-d H:i:s'),
        ];
    }
}
