<?php

namespace App\Models\e_commerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class package extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'description', 'package_id'];

    public function Child(): HasMany
    {
        return $this->hasMany(package::class);
    }

    public function Parent(): BelongsTo
    {
        return $this->belongsTo(package::class,'package_id','id');
    }
}
