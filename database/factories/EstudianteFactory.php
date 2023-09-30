<?php

namespace Database\Factories;

use App\Models\Estudiante;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class EstudianteFactory extends Factory
{
    protected $model = Estudiante::class;

    public function definition(): array
    {
        return [
            'nombres' => $this->faker->firstName(), //
            'apellidos' => $this->faker->lastName(),
            'correo' => $this->faker->email(),
            'celular' => $this->faker->phoneNumber(),
            'carrera' => $this->faker->numberBetween(1, 19),
            'carnet' => $this->faker->numberBetween(88888888, 99999999),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
