<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
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
        $details = [
            'title' => 'Request price for '.$machine->slug,
            'body' => $inputs['message'],
            'buyer'=> auth()->user()->email
        ];

        Mail::to($seller->email)->send(new ContactSellerMail($details));
        return response('Email sent Successfully',200);
    }
}
