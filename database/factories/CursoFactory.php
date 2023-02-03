<?php

namespace Database\Factories;

use App\Models\Curso;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Curso>
 */
class CursoFactory extends Factory
{   
    /**
     * the name of factory's correspondig model.
     * 
     * @var string
     */

    protected $model = Curso::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->sentences(2,true);
        return [
            'name'=> $name,
            'slug'=> Str::slug($name,'-'),
            'descripcion'=> $this->faker->paragraph(),
            'categoria'=> $this->faker->randomElement(['Desarrollo Web', 'Diseño Web'])
        ];
    }
}
