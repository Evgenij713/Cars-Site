<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Comments extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comment::create(['user_id' => rand(1, 10), 'body' => 'Супер!', 'commentable_type' => 'cars', 'commentable_id' => 29]);
        Comment::create(['user_id' => rand(1, 10), 'body' => 'Отличный выбор.', 'commentable_type' => 'cars', 'commentable_id' => 29]);
        Comment::create(['user_id' => rand(1, 10), 'body' => 'Хочу тест-драйв', 'commentable_type' => 'cars', 'commentable_id' => 29]);
        Comment::create(['user_id' => rand(1, 10), 'body' => 'Дорогая машина', 'commentable_type' => 'cars', 'commentable_id' => 24]);
        Comment::create(['user_id' => rand(1, 10), 'body' => 'Большой выбор', 'commentable_type' => 'brands', 'commentable_id' => 24]);
        Comment::create(['user_id' => rand(1, 10), 'body' => 'Красота', 'commentable_type' => 'brands', 'commentable_id' => 4]);
    }
}
