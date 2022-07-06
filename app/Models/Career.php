<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;
    protected $table = 'careers';
    protected $fillable = [
        'title',
        'subject',
        'post',
        'description',
        'position_id'

    ];
    
    public function position()
    {
        return $this->belongsTo(position::class);
    }
}