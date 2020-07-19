<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('Set FOREIGN_KEY_CHECKS = 0');
        User::truncate();
        DB::table('role_user')->truncate();
        DB::statement('Set FOREIGN_KEY_CHECKS = 1');

        $adminRole = Role::where('name', 'admin')->first();
        $moderatorRole = Role::where('name', 'moderator')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password')
        ]);

        $moderator = User::create([
            'name' => 'moderator',
            'email' => 'moderator@moderator.com',
            'password' => Hash::make('password')
        ]);

        $user = User::create([
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => Hash::make('password')
        ]);

        $admin->roles()->attach($adminRole);
        $moderator->roles()->attach($moderatorRole);
        $user->roles()->attach($userRole);
    }
}
