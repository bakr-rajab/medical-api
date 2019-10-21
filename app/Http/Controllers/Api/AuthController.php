<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $validated = $request->validated();
        if (!$validated) {
            return response(['errors' => $validated->errors()->all()], 422);
        }

        $request['password'] = bcrypt($request['password']);
        $user = User::create($request->all());

        $token = $user->createToken('Laravel Grant Client')->accessToken;
        $response = ['token' => $token];

        return response($response, 200);

    }

    public function login(LoginRequest $request)
    {

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $token = Auth::user()->createToken('Laravel Grant Client')->accessToken;
            $response = [
                'token' => $token,
                'name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ];
            return response($response, 200);
        } else {
            $response = "Password missmatch";
            return response($response, 422);
        }
//        $user = User::where('email', $request->email)->first();
//        if ($user) {
//            if (Hash::check($request->password, $user->password)) {
//                $token = $user->createToken('Laravel Grant Client')->accessToken;
//                $response = ['token' => $token];
//                return response($response, 200);
//            } else {
//                $response = "Password missmatch";
//                return response($response, 422);
//            }
//        } else {
//            $response = 'User does not exist';
//            return response($response, 422);
//        }
    }

    public function logout(Request $request)
    {

        $token = $request->user()->token();
        $token->revoke();

        $response = 'You have been succesfully logged out!';
        return response($response, 200);

    }
}
