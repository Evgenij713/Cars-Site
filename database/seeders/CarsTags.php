<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarsTags extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Получаем все машины и теги
        $cars = Car::all();
        $tags = Tag::all();

        // Проверяем, что есть хотя бы одна машина и один тег
        if ($cars->isEmpty() || $tags->isEmpty()) {
            $this->command->info('Машины и теги не найдены. Операция заполнение таблицы car_tag отменена.');
            return;
        }

        // Для каждой машины прикрепляем случайное количество тегов
        $cars->each(function ($car) use ($tags) {
            // Выбираем случайное количество тегов (от 1 до 3)
            $randomTags = $tags->random(rand(1, 3));

            // Прикрепляем теги к машине
            $car->tags()->syncWithoutDetaching($randomTags->pluck('id')->toArray());
        });

        $this->command->info('Теги автомобилей успешно добавлены!');
    }
}
