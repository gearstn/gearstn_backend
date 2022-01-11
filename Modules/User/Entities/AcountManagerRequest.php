<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AcountManagerRequest extends Model
{
    use HasFactory;

    protected $table = 'account_manager_requests';

    protected $fillable = [
        'company_name',
        'email',
        'first_name',
        'last_name',
        'user_id',
        'assigned_to_id'
    ];

    public static $cast = [
        'email' => 'required',
        'first_name' => 'required',
        'last_name' => 'required',
        'user_id' => 'required',
    ];


    protected static function newFactory()
    {
        // return \Modules\User\Database\factories\AcountManagerRequestFactory::new();
    }
}
