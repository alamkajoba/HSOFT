<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subscriber>
 */
class SubscriberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstName'   => $this->faker->firstName(),
            'middleName'  => $this->faker->firstName(),
            'lastName'    => $this->faker->lastName(),

            'gender'      => $this->faker->randomElement(['homme', 'femme']),

            'bloodGroup'  => $this->faker->randomElement([
                'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-'
            ]),

            'birthDate'   => $this->faker->date('Y-m-d', '-18 years'),
            'birthTown'   => $this->faker->city(),

            'affectation' => $this->faker->randomElement([
                'Comptabilité', 'RH', 'Sécurité', 'Administration', 'Informatique'
            ]),

            'matricule'   => strtoupper($this->faker->bothify('EMP###')),

            'type'        => $this->faker->randomElement([
                'enfant', 'mari', 'femme', 'employé(e)'
            ]),

            'address'     => $this->faker->address(),
            'number'      => $this->faker->phoneNumber(),
        ];
    }
}
