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
 *      property="Анонс",
 *      type="text"
 *  ),
 * @SWG\Property(
 *      property="Текст",
 *      type="text"
 *  ),
 * @SWG\Property(
 *      property="author_id",
 *      type="integer"
 *  ),
 * @SWG\Property(
 *      property="Slug",
 *      type="string"
 *  )
 * )
 */

class Article extends Model
{
    use HasFactory;

    public function authors(){
        return $this->belongsTo(Author::class,'author_id','id');
    }
    public function categories(){
        return $this->belongsToMany(Category::class);
    }
    public function articleCategories(){
        return $this->belongsToMany(ArticleCategory::class);
    }
    protected $hidden = ['updated_at'];

}
