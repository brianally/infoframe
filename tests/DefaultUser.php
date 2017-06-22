<?php

namespace Tests;

use App\User;

trait DefaultUser
{
    /**
     * gets the default user for methods requiring authentication
     *
     * @return User
     */
    public function getDefaultUser() {
        return User::where('id', 1)->first();
    }
}
