<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            "id" => $this->id,
            "title" => $this->title,
            "views" => $this->views,
            "description" => $this->description,
            "published_at" => nepalidate($this->created_at),
            "image" => asset($this->image),
            "meta_keywords" => $this->meta_keywords,
            "meta_description" => $this->meta_description,
        ];
    }
}
