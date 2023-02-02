<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function update(User $user, User $model)
        {
        return in_array($user->email,[
        'udin1@staf.unair.ac.id',
        $model->email,
        ]);
        }

        public function delete(User $user, User $model)
        {
        return in_array($user->email,[
        'udin1@staf.unair.ac.id',
        $model->email,
        ]);
        }
}
