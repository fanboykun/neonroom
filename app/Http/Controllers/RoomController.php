<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use App\Http\Resources\RoomResource;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return RoomResource::collection(Room::all());
        // return response()->json([
        //     'rooms' => Room::all(),
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRoomRequest $request)
    {
        $data = $request->validated();
        // $data['lecturer_id'] = $request->user()->id;
        $room = Room::create($data);
        return response()->json(['room' => $room]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        return response()->json(['room' => $room->load(['year', 'days', 'users'])]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoomRequest $request, Room $room)
    {
        $data = $request->validated();
        // $data['lecturer_id'] = $request->user()->id;
        $room->update($data);
        return response()->json(['room' => $room]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return Http::response(null, 204);
    }

    public function members(Room $room)
    {
        return response()->json(['members' => $room->users]);
    }

    public function ownRoom(User $user)
    {
        return response()->json(['rooms' => $user->load('ownedRooms')]);
    }
}
