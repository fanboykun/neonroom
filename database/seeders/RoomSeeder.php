<?php

namespace Database\Seeders;

use App\Models\Day;
use App\Models\User;
use App\Models\Year;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $u = User::take(3)->get();
        $d = Day::all();
        $y = Year::all();
        $users = collect($u);
        $days = collect($d);
        $years = collect($y);

        $members = User::whereNotIn('id', [1,2,3])->get();

        foreach ($users as $user) {
            \App\Models\Room::factory()->state([
                'lecturer_id' => $user->id,
            ])->for($years->random())
            ->hasAttached($days->random(rand(1,3)))
            ->hasAttached($members)
            ->create();
        }
    }
}
