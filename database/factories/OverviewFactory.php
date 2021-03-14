<?php

namespace Database\Factories;

use App\Models\Overview;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class OverviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Overview::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $suffix = [
            'Sissetulek',
            'Väljaminek'

        ];
        return [
            'money' => random_int(1, 400),
            'comment' => $this->faker->text(50),
            'type' => Arr::random($suffix)
        ];
    }
}
