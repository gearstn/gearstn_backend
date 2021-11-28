<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
class AuthController extends Controller
{
    use ApiResponser;

    public function register(Request $request)
    {
        $inputs = $request->all();
        $validator = Validator::make($inputs, [
            'first_name' => 'string|max:255',
            'last_name' => 'string|max:255',
            'company_name' => 'string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }
        $inputs['password'] = bcrypt($inputs['password']);
        $role = Role::find($inputs['role_id'])->first();
        $user = User::create($inputs);
        $user->assignRole($role);
        event(new Registered($user));

        // $token = $user->createToken('API Token')->plainTextToken;
        return response()->json([
            'message' => 'You Have registered successfully',
            'email_verification' => 'Please, check your Email to verify your Email',
        ]);
    }


    public function login(Request $request)
    {
        $attr = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:6'
        ]);

        if (!Auth::attempt($attr)) {
            return $this->error('Credentials not match', 401);
        }

        return response()->json([
            'token' => auth()->user()->createToken('API Token')->plainTextToken
        ]);
    }

    public function logout()
    {

        auth()->user()->tokens()->delete();

        return [
            'message' => 'Tokens Revoked'
        ];
    }

    public function forgotPassword(Request $request)
    {
        // dd($request->all());
        $request->validate(['email' => 'required|email']);
        $status = Password::sendResetLink(
            $request->only('email')
        );
        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function __invoke()
    {
        // ...
    }
}
