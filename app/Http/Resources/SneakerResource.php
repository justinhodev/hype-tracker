<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SneakerResource extends JsonResource
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
            'name' => $this->Name,
            'price' => $this->Price,
            'brand' => $this->Brand,
        ];
    }
}
