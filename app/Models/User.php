<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Silber\Bouncer\Database\HasRolesAndAbilities;

class User extends \Illuminate\Foundation\Auth\User
{
    use HasRolesAndAbilities, Notifiable;

    public function run(): void
    {
        User::factory();
    }

}
