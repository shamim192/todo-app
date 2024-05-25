<?php

namespace App\Http\Controllers;

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

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData  = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $data = Task::create($validatedData);

        if ($data) {
            session()->flash('successMessage', 'Task was successfully added.');
        } else {
            session()->flash('errorMessage', 'Task saving failed!');
        }

        return redirect()->action([self::class, 'create']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData  = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $task = Task::findOrFail($id);

        $updated = $task->update($validatedData);

        if ($updated) {
            session()->flash('successMessage', 'Task was successfully updated.');
        } else {
            session()->flash('errorMessage', 'Task update failed!');
        }

        return redirect()->action([self::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = Task::findOrFail($id);
            $data->delete();

            session()->flash('successMessage', 'Task was successfully deleted.');
        } catch (\Exception $e) {
            session()->flash('errorMessage', 'Task deleting failed! Reason: ' . $e->getMessage());
        }

        return redirect()->action([self::class, 'index']);
    }

     /**
     * toggle the status
     */

    public function toggleStatus(Request $request)
    {
        $task = Task::findOrFail($request->id);
        $task->status = $request->status == 'true' ? 1 : 0;
        $task->save();
    
        return response()->json(['message' => 'Task status updated successfully.']);
    }
}
