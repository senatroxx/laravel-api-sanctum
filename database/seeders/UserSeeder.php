<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
                'name' => 'Athhar Kautsar',
                'email' => 'athharkautsar14@gmail.com',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'Sri A. Rahayu',
                'email' => 'sri@gmail.com',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'Roger Martin',
                'email' => 'roger@gmail.com',
                'password' => bcrypt('password')
            ],
        ])->each(function($user) {
            \App\Models\User::create($user);
        });

        collect(['admin', 'moderator'])->each(function($role) {
            \App\Models\Role::create(['name' => $role]);
        });

        User::find(1)->roles()->attach([1]);
        User::find(2)->roles()->attach([2]);
    }
}
