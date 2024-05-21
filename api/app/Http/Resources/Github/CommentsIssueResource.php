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
        $number = Arr::get($data, 'number');

        return [
            'id' => Arr::get($data, 'id'),
            'number' => $number,
            'body' => Arr::get($data, 'body'),
            'user' => [
                'login' => Arr::get($data, 'login'),
                'avatar_url' => Arr::get($data, 'avatar_url'),
            ],
            'created_at' => Carbon::parse(Arr::get($data, 'created_at'))->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::parse(Arr::get($data, 'updated_at'))->format('Y-m-d H:i:s'),
        ];
    }
}
