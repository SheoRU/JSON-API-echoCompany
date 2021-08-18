<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
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
            'id'=>$this->id,
            'ФИО'=>$this->ФИО,
            'Аватар'=>$this->Аватар,
            'ГодРождения'=>$this->ГодРождения,
            'Биография'=>$this->Биография,
            'slug'=>$this->Slug,
        ];
    }
}
