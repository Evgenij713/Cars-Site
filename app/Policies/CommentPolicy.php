<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class CommentPolicy
{
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->isBuyer() || $user->isManager() || $user->isModerator();
    }
}
