<?php

namespace Database\Factories;

use App\Models\Ouvrages;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class OuvragesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ouvrages::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'type_ouvrage'  => $faker->type_ouvrage,
        'code'  => $faker->code,
        'date_edition'  => $faker->date_edition,
        'editeur'  => $faker->editeur,
        'nbrpage'  => $faker->nbrpage,
        'titre'  => $faker->titre,
        'annee_universitaire'  => $faker->annee_universitaire,
        'emplacement '  => $faker->emplacement
        ];
    }
}
