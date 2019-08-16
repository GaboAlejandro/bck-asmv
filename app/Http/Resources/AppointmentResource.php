<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
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
            'appointment' => (string) $this->appointment,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
            'user_id' => $this->user,

        ];
    }
}
