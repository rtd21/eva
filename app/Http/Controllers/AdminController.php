<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\UpdateAdmin;
use App\Models\Admin;
use App\Models\Event;
use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        $events = Event::where('admin_id', Auth::id())->get();
        return view('admin.admin')->with([
            'events' => $events
        ]);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function update(UpdateAdmin $request, $id)
    {
        $admin = Admin::find($id);
        $admin->update($request->all());
        $admin->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
    }
}
