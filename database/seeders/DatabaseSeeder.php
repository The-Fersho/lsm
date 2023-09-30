<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Administrador UML',
            'email' => 'bibliotecaocotal@uml.edu.ni',
        ]);

        //Create 2500 books
        \App\Models\Libro::factory(2500)->create();
        //Create 10 students

        \App\Models\Estudiante::factory(500)->create();
        //Create 10 teachers
        \App\Models\Docente::factory(500)->create();

        //Create 250 atenciones
        \App\Models\Atencion::factory(250)->create();
    }
}
