<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PhonesResource extends JsonResource
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
            'phone_no' => $this->phone_no,
            'provider' => $this->provider,
            'created_at' => date('d F Y', strtotime($this->created_at)),
            'updated_at' => date('d F Y', strtotime($this->updated_at)),
        ];
    }
}
