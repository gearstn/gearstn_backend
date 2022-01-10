<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AcountManagerRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'email',
        'first_name',
        'last_name',
        'user_id'
    ];

    protected static function newFactory()
    {
        // return \Modules\User\Database\factories\AcountManagerRequestFactory::new();
    }
}
