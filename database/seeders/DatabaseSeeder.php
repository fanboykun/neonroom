<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //check if the app is run on production or development
        if (env('APP_ENV') === 'production') {
            $this->call(DayAndYearSeeder::class);
        } else {
            User::factory(13)->create();
            $this->call(DayAndYearSeeder::class);
            $this->call(RoomSeeder::class);
            $this->call(ScheduleSeeder::class);
        }
    }
}
