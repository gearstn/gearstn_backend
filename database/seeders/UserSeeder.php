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
        $user1 = [
            'first_name' => 'User',
            'last_name' => 'User',
            'company_name' => 'Company',
            'email' => 'user@user.com',
            'password' => bcrypt('12345678'),
        ];
        $admin = [
            'first_name' => 'admin',
            'last_name' => 'admin',
            'company_name' => 'Company',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678'),
        ];
        User::create($user1);
        User::create($admin);
    }
}
