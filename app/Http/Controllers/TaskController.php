<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::latest()->get();

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|max:255',
            'description' => 'nullable|max:1000',
        ]);

        Task::create($request->only(['title', 'description']));

        return redirect()->route('tasks.index')
            ->with('success', 'Tâche créée !');
    }

    public function show(Task $task)
    {
        return redirect()->route('tasks.edit', $task);
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|min:3|max:255',
            'description' => 'nullable|max:1000',
        ]);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'completed' => $request->has('completed'),
        ]);

        return redirect()->route('tasks.index')
            ->with('success', 'Tâche modifiée !');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')
            ->with('success', 'Tâche supprimée !');
    }
}
