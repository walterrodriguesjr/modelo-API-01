<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Models\Pessoa>
 */
class PessoaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'profissao_id' => random_int('1', '30'),
           'nome' => fake()->unique()->name(),
           'pais' => fake()->unique()->country(),
           'image' => fake()->unique()->text('10'),
        ];
    }
}
