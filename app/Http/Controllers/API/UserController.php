<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\User\StoreUser;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        //
    }

    public function store(StoreUser $request)
    {
        $user = new User();
        $user->fill($request->all());
        $user->save();
        return response()->json([
            'status' => '200 OK'
        ]);
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());
        $user->save();
        return response()->json([
            'status' => '200 OK'
        ]);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json([
            'status' => '200 OK'
        ]);
    }
}
