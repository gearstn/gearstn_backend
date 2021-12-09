<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Traits\ApiResponser;
use Carbon\Carbon;
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
        $role = Role::find($inputs['role_id']);
        $user = User::create($inputs);
        $user->assignRole($role);
        event(new Registered($user));

        // $token = $user->createToken('API Token')->plainTextToken;
        return response()->json([
            'message_en' => 'You Have registered successfully',
            'message_ar' => 'لقد تم تسجيل الحساب بنجاح',
            'email_verification_en' => 'Please, check your Email to verify your Email',
            'email_verification_ar' => 'من فضلك تحقق من البريد الاكترونى الخاص بك لتاكيد الحساب',
        ],200);
    }


    public function login(Request $request)
    {
        $attr = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);
        if (!Auth::attempt($attr)) {
            return $this->error('Credentials not match', 401);
        }
        if (Auth::user()->email_verified_at == null) {
            return $this->error( 'Verification Error',401,['message_en' => 'Email is not verified , please verify your email',
                                              'message_ar' => 'لم يتم التحقق من البريد الإلكتروني ، يرجى التحقق من البريد الإلكتروني الخاص بك' ]);
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



    public function verify(Request $request)
    {
        $inputs = $request->validate([
            'email' => 'required',
        ]);
        $user = User::where('email',$inputs['email'])->first();
        $user->email_verified_at = now();
        $user->save();
        return response()->json([
            'message' => 'Email verified successfully',
        ],200);
    }


    public function __invoke()
    {
        // ...
    }
}
