<?php

namespace App\ObServer;

use App\User;
use Illuminate\Support\Str;

class UserObserver{
    public function creating(User $user)
    {
        $user->email_token=Str::random();
        $user->email_active=false;
    }
}
