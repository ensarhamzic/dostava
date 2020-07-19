<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('Set FOREIGN_KEY_CHECKS = 0');
        Role::truncate();
        DB::statement('Set FOREIGN_KEY_CHECKS = 1');

        Role::create([
            'name' => 'admin'
        ]);
        Role::create([
            'name' => 'moderator'
        ]);
        Role::create([
            'name' => 'user'
        ]);
    }
}
