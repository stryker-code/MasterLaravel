<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Region extends Model
{
    use HasFactory;

    public function stores(): BelongsToMany
    {
        return $this->belongsToMany(
            Store::class,
            'regions_stores',
            'region_id',
            'store_id'
        )->withTimestamps();
    }
}
