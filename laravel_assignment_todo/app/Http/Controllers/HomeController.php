<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showHome()
    {

        $tasks = Task::where('state', 1)->orderBy('updated_at', 'asc')->get();

        return view('home', compact('tasks'));
    }
}
