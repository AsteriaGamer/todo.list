<?php

namespace App\Http\Controllers;

use App\SubTask;
use Illuminate\Http\Request;
use App\Http\Requests\SubTaskStoreRequest;
use App\Http\Requests\SubTaskUpdateRequest;

class SubTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($task_id)
    {
        return SubTask::where('task_id', 'like', $task_id)->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubTaskStoreRequest $request)
    {
        SubTask::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubTask  $subTask
     * @return \Illuminate\Http\Response
     */
    public function show(SubTask $subTask)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubTask  $subTask
     * @return \Illuminate\Http\Response
     */
    public function edit(SubTask $subTask)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubTask  $subTask
     * @return \Illuminate\Http\Response
     */
    public function update(SubTaskUpdateRequest $request, SubTask $subTask)
    {
        $subTask->update($request->all());
        $subTask->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubTask  $subTask
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubTask $subTask)
    {
        $subTask->delete();
    }
}
