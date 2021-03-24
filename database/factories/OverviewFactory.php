<?php

namespace Database\Factories;

use App\Models\Overview;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Carbon\Carbon;

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

        $dates = Carbon::instance($this->faker->dateTimeBetween('-1 year', 'today'));
        return [
            'created_at' => $dates->format('Y-m-d'),
            'money' => random_int(1, 400),
            'comment' => $this->faker->text(50),
            'type' => Arr::random($suffix),
            'date_added' => $dates->format('Y-m-d'),
            'user_id' => random_int(1, 50)
        ];
    }
}
