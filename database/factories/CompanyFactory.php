<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'comp_name'=> $this->faker->domainWord(),
            'comp_email' => $this->faker->companyEmail(),
            'comp_website'=> $this->faker->domainName(),
            'comp_contact' => $this->faker->numerify('###########'),
            'comp_address'=> $this->faker->address(),
            'comp_lat' => $this->faker->latitude($min = -90, $max = 90),
            'comp_lng' => $this->faker->longitude($min = -180, $max = 180),
            'created_at' => now(),
            'updated_at'=> now(),
        ];
    }
}
