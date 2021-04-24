<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NavigationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        $link = null;
        if ($this->category_id) {
            $link = env('BASE_URL') . '/?category=' . $this->category_id;
        }
        if ($this->page_id) {
            $link = env('BASE_URL') . '/?page=' . $this->page_id;
        }
        return [
            'id' => $this->id,
            'mainTitle' => $this->title_a,
            'altTitle' => $this->title_b,
            'link' => ($link) ? $link : '#',
            'items' => NavigationResource::collection($this->navigations)
        ];
    }
}
