<?php

namespace App\Http\Resources\Github;

use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentsIssueResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = parent::toArray($request);
        $timestamp = Carbon::parse(Arr::get($data, 'updated_at'))->format('D, M d, Y, g:ia');
        $createdDiff = Carbon::parse(Arr::get($data, 'created_at'))->diffForHumans();
        $user = Arr::get($data, 'user.login');

        return [
            'id' => Arr::get($data, 'id'),
            'body' => Arr::get($data, 'body'),
            'user' => [
                'login' => $user,
                'avatar_url' => Arr::get($data, 'user.avatar_url'),
            ],
            'created_at' => Carbon::parse(Arr::get($data, 'created_at'))->format('Y-m-d H:i:s'),
            'created_diff' => $createdDiff,
            'updated_at' => Carbon::parse(Arr::get($data, 'updated_at'))->format('Y-m-d H:i:s'),
            'timestamp' => $timestamp,
        ];
    }
}
