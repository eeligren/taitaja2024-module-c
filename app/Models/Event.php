<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'thumbnail_path',
        'results_count',
        'user_id',
        'created_at'
    ];

    public function results() : HasMany
    {
        return $this->hasMany(Result::class);
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
