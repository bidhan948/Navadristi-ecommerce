<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Directors extends Model
{
    use HasFactory;
    protected $table = 'directors';
    protected $fillable=[
        'name',
        'position',
        'image',
        'description',

    ];
}
