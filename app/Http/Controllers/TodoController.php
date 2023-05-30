<?php

namespace App\Http\Controllers;

use App\Enums\TodoStatus;
use App\Models\Todo;
use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::all();
        return view('todo.index')->with('todos', $todos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTodoRequest $request)
    {
        $todo = Todo::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => auth()->id(),
        ]);

        return response()->redirectToRoute('todo.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        return view('todo.show', compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        return view('todo.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTodoRequest $request, Todo $todo)
    {
        if ($request->has('StatusGroup')) {

            $selected = $request->input('StatusGroup');
            if ($selected === 'completed') {
                $stats = Todo::where('id', $todo->id)->update(['status' => TodoStatus::COMPLETED->value]);
                $todo->update(['title' => $request->title, 'description' => $request->description, 'status' => $stats]);
                // dd($todo->status);
                return redirect(route('todo.index'));
            } else {
                $stats = Todo::where('id', $todo->id)->update(['status' => TodoStatus::OPEN->value]);
                $todo->update(['title' => $request->title, 'description' => $request->description, 'status' => $stats]);
                // dd($todo->status);
                return redirect(route('todo.index'));
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect(route('todo.index'));
    }
}