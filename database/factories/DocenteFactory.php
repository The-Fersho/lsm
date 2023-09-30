<?php

namespace Database\Factories;

use App\Models\Docente;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class DocenteFactory extends Factory
{
    protected $model = Docente::class;

    public function definition(): array
    {
        return [
            'nombres' => $this->faker->firstName(), //
            'apellidos' => $this->faker->lastName(),
            'correo' => $this->faker->email(),
            'celular' => $this->faker->phoneNumber(),
            'especialidad' => $this->faker->numberBetween(1, 19),
            'grado' => $this->faker->numberBetween(1, 5),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
