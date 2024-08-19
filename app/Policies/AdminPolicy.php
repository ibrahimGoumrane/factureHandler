<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class AdminPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function view(User $user): Response
    {
        return $user->is_admin ? Response::allow() : Response::deny('tu n\'est pas admin');
    }
}
