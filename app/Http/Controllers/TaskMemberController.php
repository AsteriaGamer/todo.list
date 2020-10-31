<?php

namespace App\Http\Controllers;

use App\TaskMember;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\TaskMemberStoreRequest;

class TaskMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return TaskMember::with('user')->where('task_id', $id)->get();
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
    public function store(TaskMemberStoreRequest $request)
    {
        $user_id = User::select('id')->where('name', 'like', "$request->user_name%")->first();
        $new_members = TaskMember::create([
            'task_id' => $request->task_id,
            'user_id' => $user_id->id,
        ]);
        $new_members->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TaskMember  $taskMember
     * @return \Illuminate\Http\Response
     */
    public function show(TaskMember $taskMember)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TaskMember  $taskMember
     * @return \Illuminate\Http\Response
     */
    public function edit(TaskMember $taskMember)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TaskMember  $taskMember
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TaskMember $taskMember)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TaskMember  $taskMember
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaskMember $taskMember)
    {
        $taskMember->delete();
    }
}
