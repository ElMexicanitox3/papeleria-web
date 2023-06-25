<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Curso;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Curso>
 */
class CursoFactory extends Factory
{

    // Indicamos el modelo que va a modificar
    protected $model = Curso::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Generamos datos falsos
        // es php artisan make:factory CursoFactory --model=Curso
        return [
            'name' => $this->faker->sentence(),
            'descripcion' => $this->faker->paragraph(),
            'categoria' => $this->faker->randomElement(['Desarrollo web', 'Diseño web']),
        ];
    }
}
