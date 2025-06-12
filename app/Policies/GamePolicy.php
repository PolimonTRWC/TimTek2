<?php

namespace App\Policies;

use App\Models\Game;
use App\Models\User;

class GamePolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Game $game): bool
    {
        return $user->is_admin || $user->id === $game->user_id;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Game $game): bool
    {
        return $user->is_admin || $user->id === $game->user_id;
    }

    public function delete(User $user, Game $game): bool
    {
        return $user->is_admin || $user->id === $game->user_id;
    }
    public function manageGames(User $user){
        return $user->is_admin;
    }
}
