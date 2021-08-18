<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\Category;
use App\Models\Article;
use App\Models\ArticleCategory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()->count(50)->create();
        Author::factory()->count(20)->create();
        Article::factory()->count(200)->create();
        ArticleCategory::factory()->count(400)->create();
    }
}
