<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Status;
use App\Models\Category;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all()->except(['created_at','update_at']);
        return view('task',[
            'categories' => $categories,
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $categories = Category::all()->except(['created_at','update_at']);
        // return view('categorylist',[
        //     'categories' => $categories,
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'task' => ['required', 'string'],
            'date' => ['required', 'date'],
        ]);

        
        $addtask = Task::create([
             'taskname' => $request->task,
             'date' => $request->date,
             'category_id' => $request->category_id,
        ]);

        $status = Status::create([
            'task_id'=> $request->task_id,
            'status' => $request->status,
        ]);

        return redirect()->route('task')->with('success' , 'Data has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $taskLists = Task::with('status')->get();
        $statuses = Status::all();
      
        return view('tasklist',[
            'taskLists' => $taskLists,
            'statuses' => $statuses,
           
        ]);

       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $taskLists = Task::find($id);
        $categories = Category::all();

        return view('taskupdate', [
            'taskLists' => $taskLists,
            'categories'=> $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $request->update($request->all());
        // Task::find($id)->update($request->all($id));

        $task = Task::find($id);
        $task->taskname = $request->input('taskname');
        $task->date = $request->input('date');
        $task->category_id = $request->input('category_id');
        $task->update();

        // return redirect()->route('task-update')
        //     ->with('success', 'Task updated!');
        return redirect()->back()->with('success','Task updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $taskLists = Task::find($id);

        $taskLists->delete();

        return redirect()->route('task-list');
    }

    public function taskStatus(Request $request, $id){

        $taskStatus = Status::find($id);
        $taskStatus->status = $request->input('status');
        $taskStatus->task_id = $request->input('task_id');
        $taskStatus->update();

        // return redirect()->route('task-update')
        //     ->with('success', 'Task updated!');
        return redirect()->back()->with('success','Task updated successfully');

    }

    
}
