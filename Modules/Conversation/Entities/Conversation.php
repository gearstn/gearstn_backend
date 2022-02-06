<?php

namespace Modules\Conversation\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Conversation extends Model
{
    use HasFactory;

    protected $table = 'conversations';
    protected $fillable = [
        'chat_token',
        'contractor_done',
        'distributor_done',
        'contractor_id',
        'distributor_id'
    ];

    public static $cast = [
        'chat_token' => 'required|unique:conversations',
        'contractor_done' => 'required',
        'distributor_done' => 'required',
        'contractor_id' => 'required',
        'distributor_id' => 'required',
    ];    
    protected static function newFactory()
    {
        // return \Modules\Conversation\Database\factories\ConversationFactory::new();
    }
}
