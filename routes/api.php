<?php

use App\Http\Controllers\RoomController;
use App\Http\Requests\CreateRoomRequest;
use App\Models\Room;
use App\Models\Schedule;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/users', function () {
    return response()->json(['users' => \App\Models\User::with('rooms')->get()]);
});

Route::get('rooms', [RoomController::class, 'index']);
Route::post('room', [RoomController::class, 'store']);
Route::get('/room/{room}', [RoomController::class, 'show']);
Route::put('/room/{room}', [RoomController::class, 'update']);
Route::delete('/room/{room}', [RoomController::class, 'destroy']);
Route::get('/room/{room}/member', [RoomController::class, 'members']);

Route::get('/room/{room}/schedules', function (Room $room) {
    $schedules = $room->load('schedules');
    return response()->json([
        'schedules' => $schedules,
    ]);
});

Route::get('/schedule/{schedule}', function (Schedule $schedule) {
    $props = $schedule->load(['author', 'content', 'content.comments', 'task', 'presence']);
    return response()->json([
        'data' => $props,
    ]);
});

Route::get('/schedule/{schedule}/task', function (Schedule $schedule) {
    $props = $schedule->load(['task', 'task.assignments']);
    return response()->json([
        'data' => $props,
    ]);
});

Route::get('/task/{task}', function (Task $task) {
    $props = $task->load(['assignments', 'assignments.users']);
    return response()->json([
        'data' => $props,
    ]);
});

Route::get('/user/{user}/ownroom', function (User $user) {
    return response()->json(['rooms' => $user->load('ownedRooms')]);
});
