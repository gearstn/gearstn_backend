<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Modules\Category\Database\Seeders\CategorySeeder;
use Modules\City\Database\Seeders\CitySeeder;
use Modules\City\Entities\City;
use Modules\Machine\Entities\Machine;
use Modules\MachineModel\Database\Seeders\MachineModelSeeder;
use Modules\MachineModel\Entities\MachineModel;
use Modules\Manufacture\Database\Seeders\ManufactureSeeder;
use Modules\Manufacture\Entities\Manufacture;
use Modules\SubCategory\Database\Seeders\SubCategorySeeder;
use Modules\Subscription\Database\Seeders\SubscriptionSeeder;
use Modules\Upload\Database\Seeders\UploadSeeder;
use Modules\User\Database\Seeders\UserSeeder;
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
        // Role::create(['name' => 'distributor','guard_name' => 'api']);
        // Role::create(['name' => 'contractor','guard_name' => 'api']);

        // if (User::all()->count() == 0) $this->call(UserSeeder::class);
        // $this->call(UploadSeeder::class);
        // $this->call(CategorySeeder::class);
        // $this->call(SubCategorySeeder::class);
        // $this->call(ManufactureSeeder::class);
        // $this->call(CitySeeder::class);
        // $this->call(MachineModelSeeder::class);
        // $this->call(SubscriptionSeeder::class);
        // MachineModel::factory()->count(50)->create();
        // Machine::newFactory()->count(100)->create();
        $machine = new Machine();
                $images = [ "https://s3.eu-central-1.amazonaws.com/gears-tn-bucket/uploads/636ac9d7-0472-47a4-b2be-2016adf75ceb1.jpg",
                "https://s3.eu-central-1.amazonaws.com/gears-tn-bucket/uploads/8adc7595-5c0f-4690-b19b-50dea89398112.jpg",
                "https://s3.eu-central-1.amazonaws.com/gears-tn-bucket/uploads/c890a047-e71c-4758-a3a2-b0744ad290ca3.jpg",
                "https://s3.eu-central-1.amazonaws.com/gears-tn-bucket/uploads/0d4c5eaf-e3dd-4a28-bb9a-8c54afdd33194.jpg"];

        $model = MachineModel::all()->random();
        $condition = 'new';
        $price = 1000000;
        $year = 2005;
        $sku = 468087;
        $manufacture = Manufacture::find($model->manufacture_id)->first()->title_en;


        $machine->year = $year;
        $machine->sn = 'hhbqpon';
        $machine->condition = $condition;
        $machine->hours = $condition == 'new'? null : 1;
        $machine->description = 'test' ;
        $machine->sell_type = 'rent';
        $machine->rent_hours = 1;
        $machine->country = 'egypt';
        $machine->city_id = City::all()->random()->id;
        $machine->slug = $year.'-'.$manufacture.'-'.$model->title_en.'-'.$sku;
        $machine->images = json_encode([1,2,3,4]);
        $machine->approved = 1;
        $machine->featured = 1;
        $machine->verified = 1;
        $machine->sku = $sku;
        $machine->price = $price <= 100000 ? 0 : $price;
        $machine->model_id = $model->id;
        $machine->category_id = $model->category_id;
        $machine->sub_category_id = $model->sub_category_id;
        $machine->manufacture_id = $model->manufacture_id;
        $machine->seller_id = User::all()->random()->id;
        $machine->save();
    }
}
