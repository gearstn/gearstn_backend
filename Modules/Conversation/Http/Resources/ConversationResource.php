<?php

namespace Modules\Conversation\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
            "sender_done" => $this->sender_done,
            "receiver_done" => $this->receiver_done,
            "sender_id" => $this->sender_id,
            "receiver_id" => $this->receiver_id,
            "machine_id" => $this->machine_id,
        ];
        return $data;
    }
}
