<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScheduleRequest;
use App\Models\Room;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Room $room)
    {
        $schedules = $room->load('schedules');
        return response()->json([
            'schedules' => $schedules,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Room $room, ScheduleRequest $request)
    {
        $data = $request->validated();
        $data['room_id'] = $room->id;
        $schedule = Schedule::create($data);

        return response()->json([
            'schedule' => $schedule,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        $props = $schedule->load(['author', 'content', 'content.comments', 'task', 'presence']);
        return response()->json([
            'data' => $props,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ScheduleRequest $request, Schedule $schedule)
    {
        $data = $request->validated();
        $schedule->update($data);
        return response()->json([
            'schedule' => $schedule,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return response()->json([
            'message' => 'Schedule deleted',
        ]);
    }
}
