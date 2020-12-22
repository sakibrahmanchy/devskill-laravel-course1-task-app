<?php

namespace App\Http\Controllers;
use App\Models\Task;
use App\Repository\TaskRepository;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    private $taskRepository;
    public function __construct(TaskRepository $taskRepository)
    {
        $this->middleware('auth');
        $this->taskRepository = $taskRepository;
    }

    public function list() {
        $tasks = $this->taskRepository->getTasksOfCurrentUser();
        return view('home', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function save(\Illuminate\Http\Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:10|max:255',
            'description' => 'nullable|string',
            'end_time' => 'required|after:today'
        ]);
        $savedTask = $this->taskRepository->createTask($request->except('_token'));
        if ($savedTask) {
            return redirect('/home');
        } else {
            return view('404');
        }
    }
}
