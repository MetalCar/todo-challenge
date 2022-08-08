<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ToDoController extends Controller
{
    public function index(): View
    {
        return view('todo.index');
    }

    public function getToDos(): View
    {
        $toDos = ToDo::all()->sortBy('is_done');
        return view('todo.list', compact('toDos'));
    }

    public function store(): JsonResponse
    {
        $validated = request()->validate([
            'title' => ['required', 'string'],
        ]);

        ToDo::create($validated);
        return response()->json(['success' => true, 'message' => 'Die ToDo wurde angelegt.']);
    }

    public function update(ToDo $toDo)
    {
        $validated = request()->validate([
            'title' => ['required', 'string'],
            'description' => ['nullable', 'string'],
        ]);

        $toDo->update($validated);
        return response()->json(['success' => true, 'message' => 'Die ToDo wurde bearbeitet.']);
    }

    public function toggleDone(ToDo $toDo)
    {
        $toDo->is_done = !$toDo->is_done;
        $toDo->save();

        return response()->json(['success' => true]);
    }
}
