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
        Bouncer::role()->findOrCreateRoles(['admin', 'manager', 'guest']);
        $admin = User::create([
            'name' => 'Milos Djordjevic',
            'email' => 'milos@djordjevic.com',
            'password' => Hash::make('milos')
        ]);
        Bouncer::assign('admin')->to($admin);
    }
}
