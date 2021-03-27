<?php

namespace Database\Factories;

use App\Models\MacAddress;
use Illuminate\Database\Eloquent\Factories\Factory;

class MacAddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MacAddress::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'mac'           => $this->faker->macAddress,
            'description'   => $this->faker->text,
            'ssid'          => $this->faker->userName,
            'hide_ssid'     => $this->faker->boolean,
            'booted_at'     => $this->faker->dateTime,
            'firmware'      => $this->faker->opera,
            'ip_address'    => $this->faker->ipv4
        ];
    }
}

