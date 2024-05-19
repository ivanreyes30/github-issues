<?php

namespace App\Http\Resources\Github;

use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FindIssueResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = parent::toArray($request);
        $number = Arr::get($data, 'number');

        return [
            'id' => Arr::get($data, 'id'),
            'number' => $number,
            'url' => Arr::get($data, 'url'),
            'repository_url' => Arr::get($data, 'repository_url'),
            'comments_url' => Arr::get($data, 'comments_url'),
            'events_url' => Arr::get($data, 'events_url'),
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
            'labels' => collect(Arr::get($data, 'labels'))->map(function ($label) {
                return [
                    'id' => Arr::get($label, 'id'),
                    'name' => Arr::get($label, 'name'),
                    'color' => Arr::get($label, 'color'),
                    'description' => Arr::get($label, 'description'),
                ];
            })->toArray(),
            'created_at' => Carbon::parse(Arr::get($data, 'created_at'))->diffForHumans(),
        ];
    }
}
