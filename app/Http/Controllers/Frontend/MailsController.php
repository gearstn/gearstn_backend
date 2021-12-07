<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactBuyerMail;
use App\Mail\ContactSellerMail;
use App\Models\Machine;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailsController extends Controller
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
}
