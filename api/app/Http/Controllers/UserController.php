<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user) {
           if (\Hash::check($request->password, $user->password)) {
                return response()->json([
                    'api_token'     => $user->createToken($user->email)->accessToken
                ],200);
           } else {
                return response()->json(['status' => 'fail'],401);
           }
       } else {
            return response()->json(['status' => 'fail'],401);
       }
    }
}
