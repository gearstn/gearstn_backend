<?php

namespace Modules\User\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Machine\Entities\Machine;
use Modules\Machine\Http\Resources\MachineResource;
use Modules\SparePart\Entities\SparePart;
use Modules\SparePart\Http\Resources\SparePartResource;
use Modules\User\Http\Requests\SaveList\AddToListRequest;
use Modules\User\Http\Requests\SaveList\RemoveFromListRequest;

class SavedListController extends Controller
{
    public function getList()
    {
        $user = User::find(auth()->user()->id);
        return response()->json(MachineResource::collection($user->wishlist($user->id)),200);
    }

    public function addToList(AddToListRequest $request)
    {
        $inputs = $request->validated();
        $user = User::find(auth()->user()->id);
        if($inputs['product_type'] == 'machine'){
            $product = Machine::find($inputs['product_id']);
            $user->wish($product,$user->id);
        }
        else{
            $product = SparePart::find($inputs['product_id']);
            $user->wish($product,$user->id);
        }
        return response()->json($user->wishlist($user->id),200);
    }


    public function removeItem(RemoveFromListRequest $request)
    {
        $inputs = $request->validated();
        $user = User::find(auth()->user()->id);
        if($inputs['product_type'] == 'machine'){
            $product = Machine::find($inputs['product_id']);
            $user->unwish($product,$user->id);
            return response()->json(MachineResource::collection($user->wishlist($user->id)),200);
        }
        else{
            $product = SparePart::find($inputs['product_id']);
            $user->unwish($product,$user->id);
            return response()->json(SparePartResource::collection($user->wishlist($user->id)),200);
        }
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
