<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    public $timestamps = false;
    use HasFactory;

    /**
     * Get the year that owns the Time
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function year()
    {
        return $this->belongsTo(Year::class);
    }
    /**
     * Get the weekday that owns the Time
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function weekday()
    {
        return $this->belongsTo(Weekday::class);
    }
}
