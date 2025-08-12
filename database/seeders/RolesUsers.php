<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesUsers extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Проверяем наличие хотя бы одной роли и одного пользователя
        if (!Role::exists() || !User::exists()) {
            $this->command->info('Роли или пользователи не найдены. Заполнение таблицы role_user отменено.');
            return;
        }

        $users = User::all();
        foreach ($users as $user) {
            $roleId = match (true) {
                $user->id <= 2 => 3,
                $user->id <= 5 => 2,
                default => 1,
            };

            $user->roles()->syncWithoutDetaching([$roleId]);
        }

        $this->command->info('Пользователям успешно назначены роли!');
    }
}
