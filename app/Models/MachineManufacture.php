<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachineManufacture extends Model
{

    use HasFactory;
    protected $table = 'machine_manufacture';
    protected $fillable = [
        'category', // construction
        'sub_category', // loader, forklift, excvators
        'manufacture', // caterpiller
    ];
}