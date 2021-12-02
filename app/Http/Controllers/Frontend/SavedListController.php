<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use App\Models\Machine;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SavedListController extends Controller
{
    public function getList()
    {
        $user = User::find(auth()->user()->id);
        return response()->json($user->wishlist($user->id),200);
    }

    public function addToList(Request $request)
    {
        $inputs = $request->all();
        $user = User::find(auth()->user()->id);
        $machine = Machine::find($inputs['machine_id']);
        $user->wish($machine,$user->id);
        return response()->json($user->wishlist($user->id),200);
    }


    public function removeItem(Request $request)
    {
        $inputs = $request->all();
        $user = User::find(auth()->user()->id);
        $machine = Machine::find($inputs['machine_id']);
        $user->unwish($machine,$user->id);
        return response()->json($user->wishlist($user->id),200);
    }

    public function clearList()
    {
        $user = User::find(auth()->user()->id);
        $machines_whislist = $user->wishlist($user->id);
        foreach($machines_whislist as $machine)
        {
            $user->unwish($machine,$user->id);
        }
        return response()->json(['message' => 'Your list is now empty'],200);
    }
}
