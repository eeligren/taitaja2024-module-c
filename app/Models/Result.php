<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'event_id',
        'score'
    ];

    public function event() : BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
