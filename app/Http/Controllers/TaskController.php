<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\category;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return view("taskIndex", compact("tasks"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $categories = Category::all();
        return view('taskCreate', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {        
/*
        Task::create([
            'title' => $request->input('title'),
            'description' => $request->input('description')
        ]);

/*
        $taskData = $request->only(['title', 'decription']); // Manda la informacion deseada
        Task::create($taskData);
*/
//      task::create($request->all()); // Manda todo lo que ese en el formulario
        // $request->validate([
        //     'title' => 'required|string',
        //     'categories' => 'required',
        // ]);

        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->save();

        $task->categories()->attach($request->categories);

        Session()->flash('success', 'Creado exitosamente');
        return redirect('/task');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        $categories = Category::all();

        $task = Task::find($task->id);
        return view('taskShow', compact('task', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $task->title = $request->title;
        $task->description = $request->description;
        
        if($request->has('done')){
            $task->done = $request->done;
        }
        
        $task->save();

        if($request->has('categories')){
            $task->categories()->sync($request->categories);
        }else{
            $task->categories()->detach();
        }

        Session()->flash('success', 'Editado exitosamente');
        return redirect('/task/'.$task->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        Session()->flash('success', 'Eliminado exitosamente');
        return redirect('/task');
    }
}
