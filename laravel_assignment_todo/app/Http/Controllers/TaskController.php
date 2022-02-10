<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function add(Request $request)
    {
        Task::create([
            'comment' => $request->task,
        ]);

        return redirect()->route('show.home');
    }
}
