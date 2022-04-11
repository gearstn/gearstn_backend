<?php

namespace Modules\Conversation\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Codebyray\ReviewRateable\Contracts\ReviewRateable;
use Codebyray\ReviewRateable\Traits\ReviewRateable as ReviewRateableTrait;
class Conversation extends Model implements ReviewRateable
{

    use HasFactory;
    use ReviewRateableTrait;

    protected $table = 'conversations';
    protected $fillable = [
        'chat_token',
        'acquire_done',
        'owner_done',
        'acquire_id',
        'owner_id',
        'machine_id'
    ];

    public static $cast = [
        'chat_token' => 'required|unique:conversations',
        'acquire_id' => 'required',
        'owner_id' => 'required',
        'machine_id' => 'required',
    ];
    protected static function newFactory()
    {
        // return \Modules\Conversation\Database\factories\ConversationFactory::new();
    }
}
