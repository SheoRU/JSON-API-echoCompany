<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title2 = $this->faker->name;
        $slug = Str::Slug($title2, '-');
        return [
            'Название' =>  $title2,
            'Картинка' => $this->faker->imageUrl(850, 640, 'article', true),
            'Анонс' => $this->faker->text(100),
            'Текст' => $this->faker->text(100),
            'author_id' => $this->faker->numberBetween(1, 20),
            'Slug' => $slug,
        ];

    }
}
