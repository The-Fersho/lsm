<?php

namespace Database\Factories;

use App\Models\Atencion;
use App\Models\Libro;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class AtencionFactory extends Factory
{
    protected $model = Atencion::class;

    public function definition(): array
    {
        //Random date between now and 1 year ago
        $date = $this->faker->dateTimeBetween('-1 year', 'now');
        return [
            'atencionable_id' => $this->faker->numberBetween(1, 500), //
            'atencionable_type' => $this->faker->randomElement(['App\Models\Estudiante', 'App\Models\Docente']),
            'fecha' => $date->format('Y-m-d'),
            'hora' => Carbon::now()->format('H:i:s'),
            'fecha_devolucion' => $date->format('Y-m-d'),
            'asignatura' => $this->faker->word,
            'motivo' => 1,
            'tipo_atencion' =>$this->faker->numberBetween(1, 2),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'nivel' => $this->faker->numberBetween(1, 5),
            'libro_id' => Libro::inRandomOrder()->first()->id,
        ];
    }
}
