<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PageResource extends JsonResource
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
            'id' => $this->id,
            'cover' => $this->cover,
            'mainTitle' => $this->title_a,
            'altTitle' => $this->title_b,
            'mainCaption' => $this->caption_a,
            'altCaption' => $this->caption_b,
            'mainContent' => $this->content_a,
            'altContent' => $this->content_b,
            'nav' => $this->nav,
        ];
    }
}
