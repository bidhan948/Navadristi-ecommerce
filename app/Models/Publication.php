<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;
    protected $table = 'publications';
    protected $fillable = [
        'title',
        'description',
        'auth_name',
        'cover_img',
        'public_year',
        'file'
    ];
}
