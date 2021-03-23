<?php

namespace App\Http\Resources;

use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'post_id' => $this->id,
            'title' => $this->title,
            'descriptiion' => $this->description,
            'slug' => $this-> slug,
            'user' => new UserResource($this->user),
        ];
    }
}
