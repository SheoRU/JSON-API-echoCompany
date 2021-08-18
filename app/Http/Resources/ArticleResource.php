<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
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
            'Анонс'=>$this->Анонс,
            'Текст'=>$this->Текст,
            'author_id'=>$this->author_id,
            'categories_id'=>$this->categories_id,
            'slug'=>$this->Slug,
        ];
    }
}
