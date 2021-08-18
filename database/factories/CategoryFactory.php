<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title3 = $this->faker->name;
        $slug = Str::Slug($title3, '-');
        return [
            'Название' =>  $title3,
            'Картинка' => $this->faker->imageUrl(850, 640, 'cat', true),
            'Описание' => $this->faker->text(100),
            'Slug' => $slug,
        ];
    }
}
