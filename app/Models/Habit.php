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
}
