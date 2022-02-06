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
        'sender_done',
        'receiver_done',
        'sender_id',
        'receiver_id',
        'machine_id'
    ];

    public static $cast = [
        'chat_token' => 'required|unique:conversations',
        'sender_id' => 'required',
        'receiver_id' => 'required',
        'machine_id' => 'required',
    ];    
    protected static function newFactory()
    {
        // return \Modules\Conversation\Database\factories\ConversationFactory::new();
    }
}
