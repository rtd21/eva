<?php

namespace App\Http\Controllers\API;

use App\Models\Speaker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SpeakerController extends Controller
{
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function like(Request $request, $speaker_id)
    {
        $speaker = Speaker::find($speaker_id);
        $speaker->like($request->user_id);
        return response()->json([
            'status' => '200 OK'
        ]);
    }
}
