<?php

namespace Modules\User\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Machine\Entities\Machine;
use Modules\Machine\Http\Resources\MachineResource;
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
        $machine = Machine::find($inputs['machine_id']);
        $user->wish($machine,$user->id);
        return response()->json($user->wishlist($user->id),200);
    }


    public function removeItem(RemoveFromListRequest $request)
    {
        $inputs = $request->validated();
        $user = User::find(auth()->user()->id);
        $machine = Machine::find($inputs['machine_id']);
        $user->unwish($machine,$user->id);
        return response()->json(MachineResource::collection($user->wishlist($user->id)),200);
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
