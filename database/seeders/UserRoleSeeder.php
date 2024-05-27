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
        $admin = User::create([
            'name' => 'Milos Djordjevic',
            'email' => 'milos@djordjevic.com',
            'password' => Hash::make('milos')
        ]);
        Bouncer::assign('admin')->to($admin);

        $manager = User::create([
            'name' => 'Viktorija Kitanovic',
            'email' => 'viktorija@kitanovic.com',
            'password' => Hash::make('viktorija')
        ]);
        Bouncer::assign('manager')->to($manager);

        $user = User::create([
            'name' => 'Sara Miljkovic',
            'email' => 'sara@miljkovic.com',
            'password' => Hash::make('sara')
        ]);
        Bouncer::assign('user')->to($user);

        Bouncer::allow('admin')->to(['crete-new-managers', 'delete-comments']);
        Bouncer::allow('manager')->to('create-new-posts');
        Bouncer::allow('user')->to('create-new-comments');

    }
}
