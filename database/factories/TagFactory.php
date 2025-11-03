<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    /**
     * El modelo correspondiente a esta fábrica.
     *
     * @var string
     */
    protected $model = Tag::class;

    /**
     * Define los valores por defecto del modelo Tag.
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        ];
    }
}
