<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachineModel extends Model
{

    use HasFactory;
    protected $table = 'models';
    protected $fillable = [
        'title',
        'category_id', // loader, forklift, excvators
        'subcategory_id', // loader, forklift, excvators
        'manufacture_id', // caterpiller
    ];
}
