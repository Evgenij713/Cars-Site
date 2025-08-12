<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    protected $guarded = [];

    /**
     * Получить марки автомобилей страны.
     */
    public function brands(): HasMany
    {
        return $this->hasMany(Brand::class);
    }
}
