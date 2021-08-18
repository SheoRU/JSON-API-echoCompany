<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'Название'=>$this->Название,
            'Картинка'=>$this->Картинка,
            'Описание'=>$this->Описание,
            'slug'=>$this->Slug,
        ];
    }
}
