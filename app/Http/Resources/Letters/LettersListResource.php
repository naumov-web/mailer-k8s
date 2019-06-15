<?php

namespace App\Http\Resources\Letters;

use App\Http\Resources\Recipients\RecipientsListResource;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class LettersListResource
 * @package App\Http\Resources
 */
class LettersListResource extends JsonResource
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
            'subject' => $this->subject,
            'content' => $this->content,
            'status_id' => $this->status_id,
            'recipients' => RecipientsListResource::collection($this->recipients),
        ];
    }
}
