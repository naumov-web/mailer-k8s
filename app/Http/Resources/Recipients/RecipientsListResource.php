<?php

namespace App\Http\Resources\Recipients;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class RecipientsListResource
 * @package App\Http\Resources
 */
class RecipientsListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request) : array
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'name' => $this->name,
            'surname' => $this->surname,
        ];
    }
}
