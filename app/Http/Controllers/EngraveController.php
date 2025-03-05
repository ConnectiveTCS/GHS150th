<?php

namespace App\Http\Controllers;

use App\Mail\AdminEngrave;
use App\Mail\UserEngrave;
use App\Models\Engrave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EngraveController extends Controller
{
    //
    public function index()
    {
        return view('engrave.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required'
        ]);

        $engrave = new Engrave([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'message' => $request->get('message')
        ]);

        $engrave->save();
        // Send email to user
        Mail::to($engrave->email)->send(new UserEngrave($engrave));

        // Send email to admin
        Mail::to('oqa@qtghs.co.za')->send(new AdminEngrave($engrave));
        return redirect('/engrave')->with('success', 'Engrave has been added');
    }

    public function create()
    {
        return view('engrave.create');
    }

    public function edit($id)
    {
        $engrave = Engrave::find($id);
        return view('engrave.edit', compact('engrave'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required'
        ]);

        $engrave = Engrave::find($id);
        $engrave->name = $request->get('name');
        $engrave->email = $request->get('email');
        $engrave->phone = $request->get('phone');
        $engrave->message = $request->get('message');
        $engrave->save();
        return redirect('/engrave')->with('success', 'Engrave has been updated');
    }

    public function destroy($id)
    {
        $engrave = Engrave::find($id);
        $engrave->delete();
        return redirect('/engrave')->with('success', 'Engrave has been deleted');
    }
}
