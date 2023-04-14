<?php

namespace Database\Seeders;

use App\Models\Month;
use Illuminate\Database\Seeder;

class MonthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Month::firstOrCreate(['name' => 'January'], ['name' => 'January']);
        Month::firstOrCreate(['name' => 'February'], ['name' => 'February']);
        Month::firstOrCreate(['name' => 'March'], ['name' => 'March']);
        Month::firstOrCreate(['name' => 'April'], ['name' => 'April']);
        Month::firstOrCreate(['name' => 'May'], ['name' => 'May']);
        Month::firstOrCreate(['name' => 'June'], ['name' => 'June']);
        Month::firstOrCreate(['name' => 'July'], ['name' => 'July']);
        Month::firstOrCreate(['name' => 'August'], ['name' => 'August']);
        Month::firstOrCreate(['name' => 'September'], ['name' => 'September']);
        Month::firstOrCreate(['name' => 'October'], ['name' => 'October']);
        Month::firstOrCreate(['name' => 'November'], ['name' => 'November']);
        Month::firstOrCreate(['name' => 'December'], ['name' => 'December']);
    }
}
