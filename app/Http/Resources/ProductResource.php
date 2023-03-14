<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'merchant' => $this->merchant->name ?? '',
            'price' => $this->price,
            'status' => $this->status,
            'created_at' => Carbon::parse($this->created_at)->isoFormat('D MMMM Y'),
        ];
    }
}
