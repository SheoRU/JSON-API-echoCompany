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
 *      property="ФИО",
 *      type="string"
 *  ),
 *  @SWG\Property(
 *      property="Аватар",
 *      type="string"
 *  ),
 * @SWG\Property(
 *      property="ГодРождения",
 *      type="string"
 *  ),
 * @SWG\Property(
 *      property="Биография",
 *      type="text"
 *  ),
 * @SWG\Property(
 *      property="Slug",
 *      type="string"
 *  )
 * )
 */

class Author extends Model
{
    use HasFactory;

    public function articles(){
        return $this->hasMany(Article::class);
    }
    protected $hidden = ['updated_at'];
}
