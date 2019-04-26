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
        Auth::login($user);
        $accessToken = $user->createToken($user->id);
        return response()->json([
            'access_token' => $accessToken->token->id
        ]);
    }
}
