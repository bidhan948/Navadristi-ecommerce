<?php

namespace App\Models\e_commerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class package_detail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['package_id', 'name', 'description', 'price', 'added_By','token'];

    // over riding orm to insert user id by default
    protected static function booted()
    {
        static::creating(function ($product) {
            $product->added_By = auth()->id();
        });
    }

    public function Package(): BelongsTo
    {
        return $this->belongsTo(package::class);
    }
}
