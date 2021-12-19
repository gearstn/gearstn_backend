<?php

namespace Modules\Subscription\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\User\Entities\User;

class Subscription extends Model
{
    use HasFactory;

    protected $table = 'subscriptions';
    protected $fillable = ['title_en','title_ar','details'];

    public static $cast = [
        'title_en' => 'required',
        'title_ar' => 'required',
        'details' => 'required',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    protected static function newFactory()
    {
        //return \Modules\Subscription\Database\factories\SubscriptionFactory::new();
    }
}
