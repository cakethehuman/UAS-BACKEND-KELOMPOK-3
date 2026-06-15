<?php

namespace App\Policies;

use App\Models\Standing;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class StandingPolicy
{
    /**
     * Perform pre-authorization checks.
     */

    public function before(User $user, string $ability): ?bool
    {
	    if ($user->is_admin) {
		return true; // admin bisa semua	
	    }
	    return null; // Cek method lain   
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Standing $standing): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Standing $standing): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Standing $standing): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Standing $standing): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Standing $standing): bool
    {
        return false;
    }
}
