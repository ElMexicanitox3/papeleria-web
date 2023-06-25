<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Curso;
use Database\Factories\CursoFactory;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Llamamos a la clase Curso y le decimos que cree 10 registros
        // $this->call(CursoSeeder::class);

        // Llamamos el factory
        // Curso ::factory(50)->create();
        // Generams 50 registros
        Curso::factory(50)->create();
    }
}
