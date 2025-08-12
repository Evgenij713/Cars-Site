<?php

namespace App\Models;

use App\Enums\Cars\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Car extends Model
{
    use SoftDeletes;

    protected $casts = [
        'status' => Status::class
    ];
    protected $fillable = ['user_id', 'status', 'brand_id', 'model', 'price', 'transmission', 'vin'];

    /**
     * Получить пользователя, который добавил автомобиль.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Получить бренд автомобиля.
     */
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * Получить теги автомобиля.
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function getCanDeleteAttribute(){
        return $this->status === Status::DRAFT || $this->status === Status::CANCELED;
    }

    public function scopeOfActive($query){
        return $query->where('status', Status::ACTIVE);
    }

    /**
     * Получить все комментарии автомобиля.
     */
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function getMorphClass()
    {
        return 'cars';
    }
}
