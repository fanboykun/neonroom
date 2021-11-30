<?php

use App\Models\Room;
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

Route::get('user/{user:id}/rooms', function (Request $request, User $user) {
    return response()->json([
        'rooms' => $user->load('rooms'),
    ]);
});

Route::get('/rooms', function () {
    return response()->json(['rooms' => \App\Models\Room::with(['year', 'days'])->get()]);
});

Route::get('/room/{room:id}', function (Room $room) {
    return response()->json(['room' => $room->load(['year', 'days', 'users'])]);
});

Route::get('/user/{user:id}/ownroom', function (User $user) {
    return response()->json(['rooms' => $user->load('ownedRooms')]);
});

