<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return response()->json($tasks, 200);
        $tasks_string = json_encode($tasks);
        return view("index",compact("tasks_string"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("add");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $req = $request->except("_token");
       $task = Task::create($req);
        return response()->json($task, 201);
        return redirect("tasks");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::all()->where("user_id",$id);
        return response()->json($task, 200);
        return view("index");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // return $id;
        return view("update",compact("id"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = Task::find($id);
        $task->update($request->all());
        return response()->json($task, 200);
        return redirect("tasks");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::find($id);
        $task->delete();
        return response()->json(["message"=>"Deleted"], 200);
        return redirect("tasks");
    }
    public function addCatToTask(Request $request, $task_id)
    {
        $task = Task::findOrFail($task_id);
        $task->categories()->attach($request->category_id);
        return response()->json("success", 200);
    }
    public function getCatsForTask($id){
        $categories = Task::findOrFail($id)->categories;
        return response()->json($categories, 200);
    }
    public function getTasksForCat($id){
        $tasks = Category::findOrFail($id)->tasks;
        return response()->json($tasks, 200);
    }
}
