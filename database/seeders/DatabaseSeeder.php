<?php

namespace Database\Seeders;

use App\Models\Machine;
use App\Models\MachineModel;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        if (User::all()->count() == 0) $this->call(UserSeeder::class);
        $this->call(UploadSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(SubCategorySeeder::class);
        $this->call(ManufactureSeeder::class);
        $this->call(CitySeeder::class);
        MachineModel::factory()->count(50)->create();
        Machine::factory()->count(1000)->create();
        Role::create(['name' => 'seller','guard_name' => 'api']);
        Role::create(['name' => 'buyer','guard_name' => 'api']);
    }
}
