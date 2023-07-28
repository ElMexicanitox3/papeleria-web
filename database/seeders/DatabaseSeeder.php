<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Product;
use App\Models\Units;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // Product::factory(100)->create();
        // Category::factory(10)->create();
        // Units::factory(10)->create();
        
        Units::factory()->create([
            'name' => 'Kilogramo',
            'abbreviation' => 'Kg',
        ]);
        Units::factory()->create([
            'name' => 'Litro',
            'abbreviation' => 'Lt',
        ]);
        Units::factory()->create([
            'name' => 'Unidad',
            'abbreviation' => 'Und',
        ]);
        Units::factory()->create([
            'name' => 'Metro',
            'abbreviation' => 'Mt',
        ]);
        Units::factory()->create([
            'name' => 'Centimetro',
            'abbreviation' => 'Cm',
        ]);
        Units::factory()->create([
            'name' => 'Milimetro',
            'abbreviation' => 'Mm',
        ]);
        Units::factory()->create([
            'name' => 'Gramo',
            'abbreviation' => 'Gr',
        ]);
        Units::factory()->create([
            'name' => 'Miligramo',
            'abbreviation' => 'Mg',
        ]);
        Units::factory()->create([
            'name' => 'Mililitro',
            'abbreviation' => 'Ml',
        ]);
        Units::factory()->create([
            'name' => 'Centilitro',
            'abbreviation' => 'Cl',
        ]);
        Units::factory()->create([
            'name' => 'Metro cuadrado',
            'abbreviation' => 'Mt2',
        ]);
        Units::factory()->create([
            'name' => 'Pieza',
            'abbreviation' => 'Pz',
        ]);

    }
}
