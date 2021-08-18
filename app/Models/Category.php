<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @SWG\Definition(
 *  definition="Post",
 *  @SWG\Property(
 *      property="id",
 *      type="integer"
 *  ),
 *  @SWG\Property(
 *      property="Название",
 *      type="string"
 *  ),
 *  @SWG\Property(
 *      property="Картинка",
 *      type="string"
 *  ),
 * @SWG\Property(
 *      property="Описание",
 *      type="string"
 *  ),
 * @SWG\Property(
 *      property="Slug",
 *      type="string"
 *  )
 * )
 */

class Category extends Model
{
    use HasFactory;
    public function articles(){
        return $this->belongsToMany(Article::class);
    }
    protected $hidden = ['updated_at'];
}
