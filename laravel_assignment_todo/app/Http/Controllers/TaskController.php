<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskFormRequest;
use App\Models\Task;
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
        $tasks = Task::orderBy('created_at', 'asc')->get();

        return view('home', compact('tasks'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\TaskFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskFormRequest $request)
    {
        Task::create([
            'comment' => $request->task,
        ]);

        return redirect()->route('tasks.index');
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $task = Task::find($id);
        if($task->is_state === 0)
        {
            $task->is_state = 1;
        }
        else
        {
            $task->is_state = 0;
        }

        $task->update();
        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Task::find($id)->delete();
        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request; $request
     * @return \Illuminate\Http\Response
     */
    public function select(Request $request)
    {
        if ($request->category === '0' || $request->category === '1')
        {
            $tasks = Task::where('is_state', $request->category)->orderBy('created_at', 'asc')->get();
        }
        else
        {
            $tasks = Task::orderBy('created_at', 'asc')->get();
        }

        return view('home', compact('tasks'));
    }
}
