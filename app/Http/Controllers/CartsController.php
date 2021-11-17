<?php

namespace App\Http\Controllers;

use App\Http\Resources\MachineResource;
use App\Models\Machine;
use Illuminate\Http\Request;
use Cart;

class CartsController extends Controller
{
    public function getCart()
    {
        return response()->json(Cart::getContent(),200);
    }

    public function addToCart(Request $request)
    {
        $inputs = $request->all();
        $machine = new MachineResource(Machine::find($inputs['id'])->first());
        Cart::add(uniqid(), $machine, $machine->price, 1);
        return response()->json(Cart::getContent(),200);
    }


    public function removeItem($id)
    {
        Cart::remove($id);

        if (Cart::isEmpty()) {
            return response()->json(['message' => 'Your List is empty'],200);
        }
        return response()->json(['message' => 'Product removed successfully'],200);
    }

    public function clearCart()
    {
        Cart::clear();
        return response()->json(['message' => 'Your list cleared successfully'],200);
    }

}
