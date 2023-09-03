<?php

namespace App\Policies;

use App\Models\DataUsers;
use App\Models\Peserta;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class updatedPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Peserta $peserta)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function updateAdmin(User $user, DataUsers $dataUsers)
    {
        return $user->id == $dataUsers->users_id;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function updatePeserta(User $user, Peserta $peserta)
    {
        return $user->id == $peserta->users_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Peserta $peserta)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Peserta $peserta)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Peserta $peserta)
    {
        //
    }
}
