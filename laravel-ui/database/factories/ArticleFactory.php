<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(2,6)),
            'content' => $this->faker->paragraph(mt_rand(2,3)),
            'image' => 'image.jpg',
            'user_id' => 1,
            'category_id' => 1,

        ];
    }
}
