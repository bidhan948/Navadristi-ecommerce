<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;
    protected $table = 'resumes';
    protected $fillable = [
        'name',
        'mobile_no',
        'email',
        'position_id',
        'cv',
        'created_at'
    ];

    public $timestamps = false;

    public function position()
    {
        return $this->belongsTo(position::class);
    }
}
