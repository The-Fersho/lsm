<?php

namespace Database\Factories;

use App\Models\Libro;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class LibroFactory extends Factory
{
    protected $model = Libro::class;

    public function definition(): array
    {
        return [
            'titulo' => $this->faker->word, //
            'autor' => $this->faker->name,
            'categoria' => $this->faker->numberBetween(1, 8),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
