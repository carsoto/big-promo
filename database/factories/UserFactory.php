<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'                  => $this->faker->firstName.' '.$this->faker->firstName,
            'lastname'              => $this->faker->lastName.' '.$this->faker->lastName,
            'phone'                 => '+593963631319',
            'aditional_phone'       => '+593963631319',
            'city_id'               => 1,
            'birthday'              => $this->faker->dateTimeBetween('1990-01-01', '2021-11-15')->format('Y-m-d'),
            'email'                 => $this->faker->unique()->safeEmail,
            'email_verified_at'     => now(),
            'password'              => Hash::make('123456'),
            'type'                  => 'user',
            'terms_conditions'      => rand(0,1),
            'confirmed'             => rand(0,1),
            'remember_token'        => Str::random(10),
            'created_at'            => $this->faker->dateTimeBetween('now', '+90 days')
        ];
    }
}
