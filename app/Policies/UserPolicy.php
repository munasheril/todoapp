<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
     public function view(User $user,User $user)
     {
        //  
     }
      public function create(User $user,User $user)
     {
        //  
     }
      public function update(User $user,User $user)
     {
        If($user->privilege === 0)return true;
        return $user->id===$subject->id;
     }
     public function delete(User $user,User $user)
     {
        //  
     }
    
}
