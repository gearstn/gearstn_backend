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
        $model = MachineModel::all()->random();
        $condition = $this->faker->randomElement(['new', 'used']);
        $price = $this->faker->numberBetween(0,1000000);
        return [
            'year' => $this->faker->year($max = 'now'),
            'sn' => $this->faker->bothify('???????'),
            'condition' => $condition,
            'hours' => $condition == 'new'? null : $this->faker->numberBetween(1,80),
            'description' => $this->faker->realText($maxNbChars = 200, $indexSize = 2) ,
            'sell_type' => $this->faker->randomElement(['sell', 'rent']),
            'rent_hours' => $this->faker->numberBetween(1,80),
            'country' => $this->faker->country(),
            'city' => $this->faker->city(),
            'slug' => $this->faker->url(),
            'images' => $this->faker->randomElement($images),
            'approved' => $this->faker->numberBetween(0,1),
            'featured' => $this->faker->numberBetween(0,1),
            'skq' => $this->faker->bothify('?????????'),
            'price' => $price <= 100000 ? 0 : $price,
            'model_id' => $model->id,
            'category_id' => $model->category_id,
            'sub_category_id' => $model->sub_category_id,
            'manufacture_id' => $model->manufacture_id,
            'seller_id' => User::all()->random()->id,
        ];
    }
}
