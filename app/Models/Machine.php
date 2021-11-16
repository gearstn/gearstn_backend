<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Machine extends Model
{

    use HasFactory;
    use Searchable;
    protected $table = 'machines';
    protected $fillable = [
        'year',
        'sn',
        'condition',
        'hours',
        'description',
        'sell_type',
        'rent_hours',
        'country',
        'slug',
        'images',
        'approved',
        'sku',
        'price',
        'seller_id',
        'category_id',
        'sub_category_id',
        'manufacture_id',
        'model_id',
    ];
    public static $cast = [
        'description' => 'required',
        'condition' => 'required',
        'sell_type' => 'required',
        'seller_id' => 'required',
        'sub_category_id' => 'required',
        'manufacture_id' => 'required',
        'model_id' => 'required',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function manufacture()
    {
        return $this->belongsTo(Manufacture::class);
    }

    public function machine_model()
    {
        return $this->belongsTo(MachineModel::class);
    }

    //User how want to sell a machine
    public function seller()
    {
        return $this->belongsTo(MachineModel::class);
    }

        /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'year' => $this->year,
            'sn' => $this->sn,
            'condition' => $this->condition,
            'hours' => $this->hours,
            'description' => $this->description,
            'sell_type' => $this->sell_type,
            'rent_hours' => $this->rent_hours,
            'country' => $this->country,
            'price' => $this->price,
            'sku' => $this->sku,
            'country' => $this->country,
            'category_title_en' => $this->category['title_en'],
            'category_title_ar' => $this->category['title_ar'],
            'sub_category_title_en' => $this->sub_category['title_en'],
            'sub_category_title_ar' => $this->sub_category['title_ar'],
            'manufacture_title_en' => $this->manufacture['title_en'],
            'manufacture_title_ar' => $this->manufacture['title_ar'],
            'model' => $this->machine_model,
        ];
    }

}
