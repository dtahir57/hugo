<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class SuperUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User;
        $user->name = 'Super User';
        $user->email = 'superuser@gmail.com';
        $user->password = bcrypt('password');
        $user->save();

        $role = Role::where('name', 'Super_User')->first();
        $user->assignRole($role);
    }
}
