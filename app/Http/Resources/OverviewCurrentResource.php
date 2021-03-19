<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OverviewCurrentResource extends JsonResource
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
            'created_at' => $this->created_at->format('Y-m-d'),
            'money' => $this->money,
            'comment' => $this->comment,
            'type' => $this->type,
        ];
    }
}
