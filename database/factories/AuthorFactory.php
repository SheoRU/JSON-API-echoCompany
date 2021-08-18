<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AuthorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Author::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->name;
        $slug = Str::Slug($title, '-');
        return [
            'ФИО' =>  $title,
            'Аватар' => $this->faker->imageUrl(850, 640, 'people', true),
            'ГодРождения' => $this->faker->dateTimeBetween('1990-01-01', '2012-12-31'),
            'Биография' => $this->faker->text(100),
            'Slug' => $slug,
        ];
    }
}
