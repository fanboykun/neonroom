<?php

namespace Database\Seeders;

use App\Models\Day;
use App\Models\Year;
use Illuminate\Database\Seeder;

class DayAndYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

        foreach ($days as $day) {
            Day::create([
                'name' => $day,
            ]);
        }

        $a = 2016;
        $b = 2017;
        $d = 2030;
        $f = $d - $a;
        for ($i = 0; $i < $f; $i++) {
            Year::create([
                'name' => $a.'/'.$b,
            ]);
            $a++;
            $b++;
        }
    }
}
