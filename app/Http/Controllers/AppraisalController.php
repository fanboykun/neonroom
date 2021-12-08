<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\AppraisalRequest;
use App\Models\Appraisal;

class AppraisalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Task $task)
    {
        $task->load(['appraisals', 'appraisals.user']);
        return response()->json([
            'appraisals' => $task->appraisals,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AppraisalRequest $request, Task $task)
    {
        $data = $request->validated();
        $data['task_id'] = $task->id;
        $appraisal = Appraisal::create($data);

        return response()->json([
            'appraisal' => $appraisal,
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Appraisal $appraisal)
    {
        $props = $appraisal->load(['task', 'user']);
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
    public function update(AppraisalRequest $request, Appraisal $appraisal)
    {
        $data = $request->validated();
        $appraisal->update($data);
        return response()->json([
            'data' => $appraisal,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appraisal $appraisal)
    {
        $appraisal->delete();
        return response()->json([
            'message' => 'appraisal has been deleted',
        ]);
    }
}
