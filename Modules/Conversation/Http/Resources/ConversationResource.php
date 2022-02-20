<?php

namespace Modules\Conversation\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Machine\Entities\Machine;

class ConversationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        $data = [
            "id" => $this->id,
            "chat_token" => $this->chat_token,
            "acquire_done" => $this->acquire_done,
            "owner_done" => $this->owner_done,
            "acquire" => User::find($this->acquire_id,['id','first_name', 'last_name']),
            "owner" => User::find($this->owner_id,['id','first_name', 'last_name']),
            "machine_id" => Machine::find($this->machine_id .['id','slug']),
        ];
        return $data;
    }
}
