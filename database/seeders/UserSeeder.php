<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use illuminate\Support\Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
            'name' =>'Admin 1',
            'level' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin123'),
            'remember_token' => Str::random(60),
        ]

    );
    }
}
