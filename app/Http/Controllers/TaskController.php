<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Schedule;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Schedule $schedule)
    {
        $props = $schedule->load(['task', 'task.assignments']);
        return response()->json([
            'data' => $props,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request, Schedule $schedule)
    {
        $data = $request->validated();
        $data['schedule_id'] = $schedule->id;
        $task = Task::create($data);
        return response()->json([
            'data' => $task,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        $props = $task->load(['assignments', 'assignments.users']);
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
    public function update(TaskRequest $request, Task $task)
    {
        $data = $request->validated();
        $task->update($data);
        return response()->json([
            'data' => $task,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json([
            'message' => 'task has been deleted',
        ]);
    }
}
