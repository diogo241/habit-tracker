<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HabitLog extends Model
{
    protected $fillable = [
        'name',
        'user_id',
        'habit_id',
    ];

    /**
     * One habit log will always have one user
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * One habit log will always have one habit
     */
    public function habit(): BelongsTo
    {
        return $this->belongsTo(Habit::class);
    }
}
