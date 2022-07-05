<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
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
            'fullname' => $this->getFirstname().' '.$this->getLastname(),
            'email'    => $this->getEmail(),
            'username' => $this->getUsername(),
            'gender'   => $this->getGender(),
            'country'  => $this->getCountry(),
            'city'     => $this->getCity(),
            'phone'    => $this->getPhone(),
        ];
    }
}
