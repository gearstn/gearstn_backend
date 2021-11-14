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
        $user = [
            'first_name' => 'User',
            'last_name' => 'User',
            'company_name' => 'Company',
            'email' => 'admin@admin.com',
            'password' => '12345678',
        ];
        User::create($user);
    }
}