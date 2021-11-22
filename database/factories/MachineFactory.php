<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\MachineModel;
use App\Models\Manufacture;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MachineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $images = [ "https://s3.eu-central-1.amazonaws.com/gears-tn-bucket/uploads/636ac9d7-0472-47a4-b2be-2016adf75ceb1.jpg",
                    "https://s3.eu-central-1.amazonaws.com/gears-tn-bucket/uploads/8adc7595-5c0f-4690-b19b-50dea89398112.jpg",
                    "https://s3.eu-central-1.amazonaws.com/gears-tn-bucket/uploads/c890a047-e71c-4758-a3a2-b0744ad290ca3.jpg",
                    "https://s3.eu-central-1.amazonaws.com/gears-tn-bucket/uploads/0d4c5eaf-e3dd-4a28-bb9a-8c54afdd33194.jpg"];

        $cites = ["Cairo","Giza","Alexandria","Madīnat as Sādis min Uktūbar","Shubrā al Khaymah","Al Manşūrah",
                  "Ḩalwān","Al Maḩallah al Kubrá","Port Said","Suez","Ţanţā","Asyūţ","Al Fayyūm","Az Zaqāzīq",
                  "Ismailia","Aswān","Kafr ad Dawwār","Damanhūr","Al Minyā","Damietta","Luxor","Qinā","Sūhāj",
                  "Banī Suwayf","Shibīn al Kawm","Al ‘Arīsh","Al Ghardaqah","Banhā","Kafr ash Shaykh","Disūq",
                  "Bilbays","Mallawī","Idfū","Mīt Ghamr","Munūf","Jirjā","Akhmīm","Ziftá","Samālūţ","Manfalūţ",
                  "Banī Mazār","Armant","Maghāghah","Kawm Umbū","Būr Fu’ād","Al Qūşīyah","Rosetta","Isnā","Maţrūḩ",
                  "Abnūb","Hihyā","Samannūd","Dandarah","Al Khārjah","Al Balyanā","Maţāy","Naj‘ Ḩammādī",
                  "Şān al Ḩajar al Qiblīyah","Dayr Mawās","Ihnāsyā al Madīnah","Darāw","Abū Qīr","Fāraskūr",
                  "Ra’s Ghārib","Al Ḩusaynīyah","Safājā","Qiman al ‘Arūs","Qahā","Al Karnak","Hirrīyat Raznah",
                  "Al Quşayr","Kafr Shukr","Sīwah","Kafr Sa‘d","Shārūnah","Aţ Ţūr","Rafaḩ","Ash Shaykh Zuwayd"];

        $model = MachineModel::all()->random();
        $condition = $this->faker->randomElement(['new', 'used']);
        $price = $this->faker->numberBetween(0,1000000);
        $year = $this->faker->year($max = 'now');
        $sku = $this->faker->bothify('######');
        $manufacture = Manufacture::find($model->manufacture_id)->first()->title_en;
        return [
            'year' => $year,
            'sn' => $this->faker->bothify('???????'),
            'condition' => $condition,
            'hours' => $condition == 'new'? null : $this->faker->numberBetween(1,80),
            'description' => $this->faker->realText($maxNbChars = 200, $indexSize = 2) ,
            'sell_type' => $this->faker->randomElement(['sell', 'rent']),
            'rent_hours' => $this->faker->numberBetween(1,80),
            'country' => $this->faker->country(),
            'city' => $this->faker->randomElement($cites),
            'slug' => $year.'-'.$manufacture.'-'.$model->title_en.'-'.$sku,
            'images' => $this->faker->randomElement($images),
            'approved' => $this->faker->numberBetween(0,1),
            'featured' => $this->faker->numberBetween(0,1),
            'verified' => $this->faker->numberBetween(0,1),
            'sku' => $sku,
            'price' => $price <= 100000 ? 0 : $price,
            'model_id' => $model->id,
            'category_id' => $model->category_id,
            'sub_category_id' => $model->sub_category_id,
            'manufacture_id' => $model->manufacture_id,
            'seller_id' => User::all()->random()->id,
        ];
    }
}
