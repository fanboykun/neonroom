<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rooms = \App\Models\Room::with('lecturer')->get();

        foreach ($rooms as $room) {
            $schedule = \App\Models\Schedule::factory()->state([
                'room_id' => $room->id,
                'user_id' => $room->lecturer->id,
            ])->create();
              //content
             $content = \App\Models\Content::factory()->state([
                'schedule_id' => $schedule->id,
            ])->create();

            //comment
            for ($i=0; $i < rand(1,4); $i++) {
                \App\Models\Comment::factory()->state([
                    'content_id' => $content->id,
                    'user_id' => $room->users->random()->id,
                ])->create();
            }
            //presence
            \App\Models\Presence::factory()->state([
                'schedule_id' => $schedule->id,
            ])->hasAttached($room->users, ['checked_at' => now()])
            ->create();

            //task
            $task = \App\Models\Task::factory()->state([
                'schedule_id' => $schedule->id,
            ])->create();

            //assignment
            for ($i = 0; $i < rand(1, 3); $i++) {
               \App\Models\Assignment::factory()->state([
                    'task_id' => $task->id,
                ])->hasAttached($room->users, ['answer' => Str::random(10)])
                ->create();
            }

            foreach ($room->users as $member)
            {
                \App\Models\Appraisal::factory()->state([
                    'task_id' => $task->id,
                    'user_id' => $member->id,
                ])->create();
            }

        }
    }
}
