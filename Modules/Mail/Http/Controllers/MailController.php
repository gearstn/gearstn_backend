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
use Modules\Mail\Emails\StoreMachineMail;

class MailController extends Controller
{
    public function contact_seller(Request $request)
    {
        $inputs = $request->all();
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
        return response('Email sent Successfully',200);
    }


    public function store_machine(Request $request)
    {
        $inputs = $request->all();
        $machine = Machine::find($inputs['machine_id']);
        $seller = User::find($machine->seller_id);

        $details = [
            'title' => 'You have stored machine '.$machine->slug,
            'seller'=> $seller,
        ];

        Mail::to($seller->email)->send(new StoreMachineMail($details));
        return response('Email sent Successfully',200);
    }
}
