<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class Habit extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id',
    ];

    /**
     * One habit will always have one user 
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * One habit can have many habit logs
     */
    public function habitLogs(): HasMany
    {
        return $this->hasMany(HabitLog::class);
    }

    /**
     * Check if habit was completed today
     */

    public function wasCompletedToday(): bool
    {
        return $this->habitLogs
            ->where('user_id', Auth::user()->id)
            ->where('completed_at', Carbon::today()->toDateString())
            ->isNotEmpty();
    }

    /**
     * Generate grid graph for history of habits
     * 
     * @param int $year
     * @return array
     */
    public static function generateYearGrid(int $year): array
    {
        $startDate = Carbon::create($year, 1, 1);
        $endDate = Carbon::create($year, 12, 31);

        $weeks = [];
        $currentWeek = [];

        // Put empty years at the beginning
        $firstDayOfWeek = $startDate->dayOfWeek;
        for ($i = 0; $i < $firstDayOfWeek; $i++) {
            $currentWeek[] = null;
        }

        // Group days by week (Sunday to Saturday)
        for ($date = $startDate->copy(); $date->lte($endDate); $date->addDay()) {
            $currentWeek[] = $date->copy();

            // Close week on Saturday or end of year
            if ($date->isSaturday() || $date->eq($endDate)) {
                $weeks[] = $currentWeek;
                $currentWeek = [];
            }
        }

        return $weeks;
    }

    /**
     * Check if habit was completed in a given day
     */

    public function wasCompletedOnDay(Carbon $day): bool
    {
        return $this->habitLogs
            ->where('user_id', Auth::user()->id)
            ->where('completed_at', $day->toDateString())
            ->isNotEmpty();
    }
}
