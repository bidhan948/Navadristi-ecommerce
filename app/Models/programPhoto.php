<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class programPhoto extends Model
{
    use HasFactory;
    protected $fillable = [
        'program_id',
        'image'
    ];

    public function programs(): BelongsTo
    {
        return $this->belongsTo(Program::class, 'program_id');
    }
}
