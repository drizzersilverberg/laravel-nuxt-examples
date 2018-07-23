<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('name', $request->name)->first();
        if ($user) {
           if (\Hash::check($request->pwd,$user->pwd)) {
                return response()->json([
                    'api_token'     => $user->createToken($user->name)->accessToken
                ],200);
           } else {
                return response()->json(['status' => 'fail'],401);
           }
       } else {
            return response()->json(['status' => 'fail'],401);
       }
    }
}
