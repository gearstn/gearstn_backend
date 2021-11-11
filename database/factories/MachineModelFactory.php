<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\MachineModel;
use App\Models\Manufacture;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class MachineModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MachineModel::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->bothify('???#');
        return [
            'title_en' => $title,
            'title_ar' => $title,
            'category_id' => Category::all()->random()->id,
            'sub_category_id' => SubCategory::all()->random()->id,
            'manufacture_id' => Manufacture::all()->random()->id,
        ];
    }
}
