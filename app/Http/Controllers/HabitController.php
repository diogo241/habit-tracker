<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\HabitRequest;
use App\Models\Habit;

class HabitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $habits = auth()->user()->habits;

        return view('dashboard', compact('habits'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('habits.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HabitRequest $request)
    {
        // Validate form request
        $validated = $request->validated();

        // Create habit
        auth()->user()->habits()->create($validated);

        return redirect()
            ->route('habits.index')
            ->with('success', 'Hábito criado com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Habit $habit): View
    {
        return view('habits.edit', compact('habit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HabitRequest $request, Habit $habit)
    {
        // Validate if the user is the owner of the habit
        if ($habit->user_id != auth()->user()->id) {
            abort(403, 'Esse hábito não pertence a si');
        }

        // Validate form request
        $validated = $request->validated();

        $habit->update($validated);

        return redirect()
            ->route('habits.index')
            ->with('success', 'Hábito atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Habit $habit)
    {
        // Validate if the user is the owner of the habit
        if ($habit->user_id != auth()->user()->id) {
            abort(403, 'Esse hábito não pertence a si');
        }

        $habit->delete();

        return redirect()
            ->route('habits.index')
            ->with('success', 'Hábito apagado com sucesso');
    }
}
