<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Silber\Bouncer\BouncerFacade as Bouncer;
use App\Models\User;
use Silber\Bouncer\Database\Ability;
use Silber\Bouncer\Database\Role;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bouncer::role()->findOrCreateRoles(['admin', 'manager', 'user']);

        Bouncer::allow('admin')->to(['crete-new-managers', 'delete-comments', 'manage-categories']);
        Bouncer::allow('manager')->to('create-new-posts');
        Bouncer::allow('user')->to('create-new-comments');

    }
}
