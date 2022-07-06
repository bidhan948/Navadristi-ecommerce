<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $table = 'abouts';
    protected $fillable = [
        'title',
        'description',
        'image',
        'phone',
        'email',
        'address',
        'fb_url',
        'tw_url',
        'in_url',
        'w_link',
        'v_link',
    ];
}