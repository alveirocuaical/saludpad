<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminUserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function create(User $user, User $usuario)
    {
        return $user->role === 'admin';
    
    }
    

    public function destroy(User $user)
    {
        return $user->role === 'admin';
    }

    public function update(User $user, User $usuario)
    {
        return $user->role === 'admin';
    }
}
