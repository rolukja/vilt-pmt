<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        return Inertia::render('Task/Index', [
                'items' => Task::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        return Inertia::render('Task/Form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
         //Dynamisch erstellen
         Task::create($request->validate([
                'name' => ['required'],
'description' => ['required'],

         ]));

        return Redirect::route('task.index')->with('success', 'Task created.');
    }

    /**
     * Display the specified resource.
     *
     * @param Task $task
     * @return Response
     */
    public function show(Task $task): Response
    {
        return Inertia::render('Task/Show', [
                'data' => $task
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Task $task
     * @return Response
     */
    public function edit(Task $task): Response
    {
        return Inertia::render('Task/Form', [
                'data' => $task
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Task $task
     * @return RedirectResponse
     */
    public function update(Request $request, Task $task): RedirectResponse
    {
        $task->update($request->validate([
                'name' => ['required'],
'description' => ['required'],

        ]));

        return Redirect::route('task.index')->with('success', 'Task updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Task $task
     * @return RedirectResponse
     */
    public function destroy(Task $task): RedirectResponse
    {
        $task->delete();

        return Redirect::back()->with('success', 'Task restored.');
    }

    /**
     * Restore the specified resource.
     *
     * @param Task $task
     * @return RedirectResponse
     */
    public function restore(Task $task): RedirectResponse
    {
        $task->restore();

        return Redirect::back()->with('success', 'Task restored.');
    }
}


