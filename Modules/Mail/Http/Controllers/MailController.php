<?php

namespace Modules\Mail\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use Modules\Machine\Entities\Machine;
use Modules\Mail\Emails\ContactBuyerMail;
use Modules\Mail\Emails\ContactSellerMail;
use Modules\Mail\Emails\OpenConversationMail;
use Modules\Mail\Emails\StoreMachineMail;
use Modules\Mail\Http\Requests\ContactSellerRequest;
use Modules\Mail\Http\Requests\OpenConversationMailRequest;
use Modules\Mail\Http\Requests\StoreMachineMailRequest;

class MailController extends Controller
{
    public function contact_seller(ContactSellerRequest $request)
    {
        $inputs = $request->validated();
        $machine = Machine::find($inputs['machine_id']);
        $seller = User::find($machine->seller_id);

        $seller_details = [
            'title' => 'Request price for '.$machine->slug,
            'machine' => $machine,
            'body' => $inputs['message'],
            'seller'=> $seller,
            'buyer'=> auth()->user()
        ];

        $buyer_details = [
            'title' => 'You have requested price for '.$machine->slug,
            'seller'=> $seller,
            'buyer'=> auth()->user()
        ];

        Mail::to($seller->email)->send(new ContactSellerMail($seller_details));
        Mail::to(auth()->user()->email)->send(new ContactBuyerMail($buyer_details));
        views($machine)->record();
        return response('Email sent Successfully',200);
    }


    public function store_machine(StoreMachineMailRequest $request)
    {
        $inputs = $request->validated();
        $machine = Machine::find($inputs['machine_id']);
        $seller = User::find($machine->seller_id);

        $details = [
            'title' => 'You have stored machine '.$machine->slug,
            'seller'=> $seller,
        ];

        Mail::to($seller->email)->send(new StoreMachineMail($details));
        return response('Email sent Successfully',200);
    }


    public function open_conversation_with_seller(OpenConversationMailRequest $request)
    {
        $inputs = $request->validated();
        $machine = Machine::find($inputs['machine_id']);
        $owner = User::find($inputs['owner_id']);
        $acquire = User::find($inputs['acquire_id']);

        $details = [
            'subject' => $acquire->first_name . ' ' . $acquire->last_name . ' ' . ' opened a conversation ' ,
            'acquire'=> $acquire,
            'owner'=> $owner,
            'machine'=> $machine,
        ];

        Mail::to($owner->email)->send(new OpenConversationMail($details));
    }
}
