<?php

namespace App\Http\Controllers\API;

use App\Models\ScheduleBlock;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScheduleBlockController extends Controller
{
    public function update(Request $request, $id)
    {
        //дописать права
        $block = ScheduleBlock::find($id);
        $block->registerUser($request);
        return response()->json([
            'status' => '200 OK'
        ]);
    }
}
