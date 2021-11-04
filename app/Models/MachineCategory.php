<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachineCategory extends Model
{

    use HasFactory;
    protected $table = 'machine_category';
    protected $fillable = [
        'category', // construction
        'sub_category', // loader, forklift, excvators
    ];
}