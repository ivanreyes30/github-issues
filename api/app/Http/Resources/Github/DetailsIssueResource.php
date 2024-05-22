<?php

namespace App\Http\Resources\Github;

use Carbon\Carbon;
use Illuminate\Support\{Arr, Str};
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DetailsIssueResource extends JsonResource
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
        $createdDiff = Carbon::parse(Arr::get($data, 'created_at'))->diffForHumans();
        $timestamp = Carbon::parse(Arr::get($data, 'updated_at'))->format('D, M d, Y, g:ia');
        $comments = !Arr::get($data, 'comments')
            ? ''
            : '· '. Arr::get($data, 'comments'). ' '. Str::of('comment')->plural(Arr::get($data, 'comments'));

        return [
            'id' => Arr::get($data, 'id'),
            'number' => $number,
            'title' => Arr::get($data, 'title'),
            'body' => Arr::get($data, 'body'),
            'comments' => Arr::get($data, 'comments'),
            'labels' => collect(Arr::get($data, 'labels'))->map(function ($label) {
                return [
                    'id' => Arr::get($label, 'id'),
                    'name' => Arr::get($label, 'name'),
                    'color' => Arr::get($label, 'color'),
                    'description' => Arr::get($label, 'description'),
                ];
            })->toArray(),
            'details_text' => "#{$number} - created {$createdDiff}, $timestamp",
            'specific_details_text' => "issued $createdDiff $comments",
            'created_at' => Carbon::parse(Arr::get($data, 'created_at'))->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::parse(Arr::get($data, 'updated_at'))->format('Y-m-d H:i:s'),
            'timestamp' => $timestamp,
        ];
    }
}
