<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Role::where('slug', '=', 'ADMIN')->get()->count() === 0) {
            Role::create([
                'slug' => 'ADMIN',
                'name' => 'Administrator',
                'description' => 'User with superpowers across the website'
            ]);
        }

        if (Role::where('slug', '=', 'USER')->get()->count() === 0) {
            Role::create([
                'slug' => 'USER',
                'name' => 'User',
                'description' => 'Standard website user'
            ]);
        }
    }
}
