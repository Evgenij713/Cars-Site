<?php

namespace App\Policies;

use App\Models\Car;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CarPolicy
{
    /**
     * Просмотр всех записей.
     */
    public function viewAll(User $user): bool
    {
        return $user->isManager() || $user->isModerator();
    }
    /**
     * Просмотр только со статусом ACTIVE.
     * Determine whether the user can view any models.
     */
    public function viewActive(?User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $this->viewAll($user);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Car $car): bool
    {
        return $user->id === $car->user_id || $user->isModerator();
    }

    /**
     * Может ли пользователь изменить статус записи.
     */
    public function updateStatus(User $user, Car $car): bool
    {
        return ($user->id === $car->user_id && $user->isManager()) ||
            $user->isModerator();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Car $car): bool
    {
        return $this->update($user, $car);
    }

    public function trash(User $user): bool
    {
        return $this->viewAll($user);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Car $car): bool
    {
        return $this->update($user, $car);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user): bool
    {
        return $user->isModerator();
    }
}
