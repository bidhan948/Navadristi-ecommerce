<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allcv extends Model
{
    use HasFactory;
    protected $table = 'allcvs';
    protected $fillable = [
        'name',
        'phone',
        'email',
        'position_id',
        'cv',
    ];
    public function position()
    {
        return $this->belongsTo(position::class);
    }
}
