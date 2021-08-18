<?php

namespace Database\Factories;

use App\Models\ArticleCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ArticleCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'article_id' => $this->faker->numberBetween(1, 200),
            'category_id' => $this->faker->numberBetween(1, 50),
        ];
    }
}
