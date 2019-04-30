<?php

namespace App\Http\Controllers\API;

use App\Models\TokenRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PassportController extends Controller
{
    public function login(Request $request)
    {
        // тут определяется токен по переданному токену и можно будет проверить права пользователя
        $accessToken = TokenRepository::findByJwt($request->bearerToken());
        dd($accessToken);
    }
}
