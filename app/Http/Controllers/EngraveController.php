<?php

namespace App\Http\Controllers;

use App\Models\Engrave;
use Illuminate\Http\Request;

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
