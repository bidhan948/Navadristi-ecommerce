<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Services extends Model
{
    use HasFactory;
    protected $table = 'services';
    protected $fillable = [
        'title',
        'description',
        'image',
        'category_id',
    ];

    public function Categories(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
