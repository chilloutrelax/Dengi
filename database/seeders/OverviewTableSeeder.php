<?php

namespace Database\Seeders;
use App\Models\Overview;
use Illuminate\Database\Seeder;

class OverviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Overview::factory()->times(1000)->create();
    }
}
