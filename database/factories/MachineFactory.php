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
        $model = MachineModel::all()->random();
        return [
            'year' => $this->faker->year($max = 'now'),
            'sn' => $this->faker->bothify('???????'),
            'condition' => $this->faker->randomElement(['new', 'used']),
            'hours' => $this->faker->numberBetween(1,80),
            'description' => $this->faker->realText($maxNbChars = 200, $indexSize = 2) ,
            'sell_type' => $this->faker->randomElement(['sell', 'rent']),
            'rent_hours' => $this->faker->numberBetween(1,80),
            'sell_type' => $this->faker->randomElement(['sell', 'rent']),
            'country' => $this->faker->country(),
            'slug' => $this->faker->url(),
            'images' => $this->faker->url(),
            'approved' => $this->faker->numberBetween(0,1),
            'model_id' => $model->id,
            'category_id' => $model->category_id,
            'sub_category_id' => $model->sub_category_id,
            'manufacture_id' => $model->manufacture_id,
            'seller_id' => User::all()->random()->id,
        ];
    }
}
