<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Comment extends Model
{
    protected $guarded = [];

    /**
     * Получить родительскую модель (автомобиль или марку автомобиля), к которой относится комментарий.
     */
    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Получить пользователя, который добавил комментарий.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
