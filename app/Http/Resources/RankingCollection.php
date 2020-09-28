<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class RankingCollection extends ResourceCollection
{
    /**
     * The resource this collection collects.
     *
     * @var string
     */
    public $collects = 'App\Http\Resources\RankingResource';

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'total' => $this->count(),
            'data' => $this->collection,
        ];
    }
}
