<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialities extends Model
{
    use HasFactory;
    protected $table = 'specialities';
    protected $fillable = [
        'name',
        'icon',
        'image',
        'description',
        'symptoms',
        'treatment_options',
    ];
}
