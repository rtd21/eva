<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Passport\Passport;
use Laravel\Passport\Token;

class PassportController extends Controller
{
    public function login(Request $request)
    {
        $user = new User();
        $user->fill($request->all())->save();
        $accessToken = $user->createToken($user->id);
        Auth::login($user);
        return response()->json([
            'access_token' => $accessToken->accessToken
        ]);
    }
}
