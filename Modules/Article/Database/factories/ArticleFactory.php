<?php

namespace Modules\Article\Database\factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Article\Entities\Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => fake()->unique()->sentence(3),
            'alias' => fake()->unique()->slug,
            'body' => fake()->paragraphs(3, true),
            'user_id' => User::first()->id
        ];
    }
}
