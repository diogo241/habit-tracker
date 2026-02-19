<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\HabitRequest;
use App\Models\Habit;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\HabitLog;

class HabitController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $habits = Auth::user()->habits()
            ->with('habitLogs')
            ->get();

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
        Auth::user()->habits()->create($validated);

        return redirect()
            ->route('habits.index')
            ->with('success', 'Hábito criado com sucesso');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Habit $habit): View
    {
        $this->authorize('update', $habit);

        return view('habits.edit', compact('habit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HabitRequest $request, Habit $habit)
    {
        // Validate if the user is the owner of the habit
        $this->authorize('update', $habit);

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
        $this->authorize('delete', $habit);


        $habit->delete();

        return redirect()
            ->route('habits.index')
            ->with('success', 'Hábito apagado com sucesso');
    }

    public function settings()
    {

        $habits = Auth::user()->habits;

        return view('habits.settings', compact('habits'));
    }

    public function toggle(Habit $habit)
    {
        // Validate if the user is the owner of the habit
        $this->authorize('toggle', $habit);

        // Check todays date
        $today = Carbon::today()->toDateTimeString();

        // Get log
        $log = HabitLog::query()
            ->where('habit_id', $habit->id)
            ->where('completed_at', $today)
            ->first();

        if ($log) {
            // If exits, remove register
            $log->delete();
            $message = 'Hábito desmarcado com sucesso';
        } else {
            HabitLog::create([
                'habit_id' => $habit->id,
                'user_id' => Auth::user()->id,
                'completed_at' => $today,
            ]);
            $message = 'Hábito concluído';
        };

        return redirect()
            ->route('habits.index')
            ->with('success', $message);
    }

    /**
     * Display the habits history
     */
    public function history()
    {
        // Get the current year
        $selectedYear = Carbon::now()->year;

        // Set begin and end of year
        $startDate = Carbon::create($selectedYear, 1, 1);
        $endDate = Carbon::create($selectedYear, 12, 31, 23, 59, 59);

        // Get habits with filtered logs by year
        $habits = Auth::user()->habits()
            ->with(['habitLogs' => function ($query) use ($startDate, $endDate) {
                return $query->whereBetween('completed_at', [$startDate, $endDate]);
            }])
            ->get();

        return view('habits.history', compact('habits', 'selectedYear'));
    }
}
