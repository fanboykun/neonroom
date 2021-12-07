<?php

use App\Http\Controllers\AppraisalController;
use App\Http\Controllers\AssignmentContoller;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TaskController;
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

//room
Route::get('rooms', [RoomController::class, 'index']);
Route::post('room', [RoomController::class, 'store']);
Route::get('/room/{room}', [RoomController::class, 'show']);
Route::put('/room/{room}', [RoomController::class, 'update']);
Route::delete('/room/{room}', [RoomController::class, 'destroy']);
Route::get('/room/{room}/member', [RoomController::class, 'members']);
Route::get('/user/{user}/ownroom', [RoomController::class, 'ownRoom']);

//schedule
Route::get('/room/{room}/schedules', [ScheduleController::class, 'index']);
Route::post('/room/{room}/schedule', [ScheduleController::class, 'store']);
Route::get('schedule/{schedule}', [ScheduleController::class, 'show']);
Route::put('schedule/{schedule}', [ScheduleController::class, 'update']);
Route::delete('schedule/{schedule}', [ScheduleController::class, 'destroy']);

//content
Route::get('schedule/{schedule}/content', [ContentController::class, 'index']);
Route::post('/schedule/{schedule}/content', [ContentController::class, 'store']);
Route::get('/content/{content}', [ContentController::class, 'show']);
Route::put('/content/{content}', [ContentController::class, 'update']);
Route::delete('/content/{content}', [ContentController::class, 'destroy']);

//comment
Route::post('/content/{content}/comment', [CommentController::class, 'store']);
Route::put('/comment/{comment}', [CommentController::class, 'update']);
Route::delete('/comment/{comment}', [CommentController::class, 'destroy']);

//task
Route::get('/schedule/{schedule}/task', [TaskController::class, 'index']);
Route::post('/schedule/{schedule}/task', [TaskController::class, 'store']);
Route::get('/task/{task}', [TaskController::class, 'show']);
Route::put('/task/{task}', [TaskController::class, 'update']);
Route::delete('/task/{task}', [TaskController::class, 'destroy']);

//assignment
Route::get('/task/{task}/assignment', [AssignmentContoller::class, 'index']);
Route::post('/task/{task}/assignment', [AssignmentContoller::class, 'store']);
Route::get('/assignment/{assignment}', [AssignmentContoller::class, 'show']);
Route::put('/assignment/{assignment}', [AssignmentContoller::class, 'update']);
Route::delete('/assignment/{assignment}', [AssignmentContoller::class, 'destroy']);
Route::post('/assignment/{assignment}/answer', [AssignmentContoller::class, 'answer']);

//appraisal
Route::get('/task/{task}/appraisal', [AppraisalController::class, 'index']);
Route::post('/task/{task}/appraisal', [AppraisalController::class, 'store']);
Route::get('/appraisal/{appraisal}', [AppraisalController::class, 'show']);
Route::put('/appraisal/{appraisal}', [AppraisalController::class, 'update']);
Route::delete('/appraisal/{appraisal}', [AppraisalController::class, 'destroy']);

//presence
Route::get('/schedule/{schedule}/presence', [PresenceController::class, 'index']);
Route::post('/schedule/{schedule}/presence', [PresenceController::class, 'store']);
Route::get('/presence/{presence}', [PresenceController::class, 'show']);
Route::put('/presence/{presence}', [PresenceController::class, 'update']);
Route::delete('/presence/{presence}', [PresenceController::class, 'destroy']);
Route::post('/presence/{presence}/check', [PresenceController::class, 'check']);

//attachment
