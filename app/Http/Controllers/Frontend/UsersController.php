<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UploadsController;
use App\Http\Resources\FullUserResource;
use App\Http\Resources\NormalUserResource;
use App\Models\Machine;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @return Response
     */
    public function getNormalUser()
    {
        $id  = Auth::user()->id;
        $user = User::findOrFail($id);
        return response()->json(new NormalUserResource($user), 200);
    }

    /**
     * Display the specified resource.
     *
     * @return Response
     */
    public function getFullUser()
    {
        $id  = Auth::user()->id;
        $user = User::findOrFail($id);
        return response()->json(new FullUserResource($user), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function update(Request $request)
    {
        $inputs = $request->all();
        $user = Auth::user();
            
        //For distributor it is required to upload tax_license_image & commercial_license_image
        if ($user->hasRole('distributor') && $user->tax_license_image === null && $user->commercial_license_image === null) {
            $validator = Validator::make($inputs, [
                'tax_license' => 'required',
                'tax_license_image' => 'required',
                'commercial_license' => 'required',
                'commercial_license_image' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->messages(), 400);
            }

            //Uploads route to upload images and get array of ids
            $uploads_controller = new UploadsController();
            $request = new Request([
                'photos' => [$inputs['tax_license_image']],
                'seller_id' => $user->id,
            ]);
            $response = $uploads_controller->store($request);
            if($response->status() != 200) { return $response; }
            $inputs['tax_license_image'] = json_decode($response->getContent())[0];

            //Uploads route to upload images and get array of ids
            $uploads_controller = new UploadsController();
            $request = new Request([
                'photos' => [$inputs['commercial_license_image']],
                'seller_id' => $user->id,
            ]);
            $response = $uploads_controller->store($request);
            if($response->status() != 200) { return $response; }
            $inputs['commercial_license_image'] = json_decode($response->getContent())[0];
        }

        //For contractor it is required to upload national_id_image 
        if ($user->hasRole('contractor') && $user->national_id_image === null) {
            $validator = Validator::make($inputs, [
                'national_id' => 'required',
                'national_id_image' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->messages(), 400);
            }
        
            //Uploads route to upload images and get array of ids
            $uploads_controller = new UploadsController();
            $request = new Request([
                'photos' => [$inputs['national_id_image']],
                'seller_id' => $user->id,
            ]);
            $response = $uploads_controller->store($request);
            if($response->status() != 200) { return $response; }
            $inputs['national_id_image'] = json_decode($response->getContent())[0];
        }

        $user->update($inputs);
        $user->save();
        return response()->json(['message' => 'Profile Updated Successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['message' => 'Profile Deleted Successfully'], 200);
    }



    public function change_password(Request $request)
    {
        $input = $request->all();
        $user_id = Auth::user()->id;
        $rules = array(
            'old_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password',
        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $arr = array("status" => 400, "message" => $validator->errors()->first(), "data" => array());
        } else {
            try {
                if ((Hash::check(request('old_password'), Auth::user()->password)) == false) {
                    $arr = array("status" => 400, "message" => "Check your old password and enter it correctly.");
                } else if ((Hash::check(request('new_password'), Auth::user()->password)) == true) {
                    $arr = array("status" => 400, "message" => "Please enter a password which is not similar then current password.", "data" => array());
                } else {
                    User::where('id', $user_id)->update(['password' => Hash::make($input['new_password'])]);
                    $arr = array("status" => 200, "message" => "Password updated successfully.");
                }
            } catch (\Exception $ex) {
                if (isset($ex->errorInfo[2])) {
                    $msg = $ex->errorInfo[2];
                } else {
                    $msg = $ex->getMessage();
                }
                $arr = array("status" => 400, "message" => $msg, "data" => array());
            }
        }
        return response()->json($arr);
    }


    public function get_phone(Request $request)
    {
        $inputs = $request->all();
        $validator = Validator::make($inputs,  ['seller_id' => 'required','machine_id' => 'required']);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }

        $user = User::findOrFail($inputs['seller_id']);
        $machine = Machine::where('id', '=', $inputs['machine_id'])->firstOrFail();
        $phone = $user->phone;
        views($machine)->record();
        return response()->json($phone, 200);
    }

}