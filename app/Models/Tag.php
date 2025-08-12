<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    protected $guarded = [];

    /**
     * Получить автомобили тега.
     */
    public function cars(): BelongsToMany
    {
        return $this->belongsToMany(Car::class)->withTimestamps();
    }
}
