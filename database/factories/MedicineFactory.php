<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medicine>
 */
class MedicineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fakeDrugs = [
            'Dolmirax', 'Algénoff', 'Panerol', 'Tramadexal', 'Fivadolix',
            'Cefradon', 'Amozeryl', 'Bactoryl', 'Zytomédine', 'Neomaflox',
            'Lumefaril', 'Artemovex', 'Plasmodex', 'Quinoral', 'MalariStat',
            'Parazolium', 'Helmocid', 'Wormyclear', 'Giadrol', 'Amébolax',
            'Tussivex', 'Broncholight', 'Respimel', 'Vapoxyl', 'Tussigrad',
        ];

        return [
            'nameMedicine'   => $this->faker->randomElement($fakeDrugs),
            'category'      => $this->faker->randomElement(['Analgesiques & Antipyretiques', 'Anti-inflamatoires']),
            'quantity'  => 0,
        ];
    }
}
