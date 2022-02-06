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
            "contractor_done" => $this->contractor_done,
            "distributor_done" => $this->distributor_done,
            "contractor_id" => $this->contractor_id,
            "distributor_id" => $this->distributor_id,
        ];
        return $data;
    }
}
