<?php

namespace App\Http\Controllers;

use App\Models\SharStory;
use Illuminate\Http\Request;

class SharStoryController extends Controller
{
    //
    
    public function index()
    {
        return view('sharstory.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'class_of' => 'required',
            'message' => 'required'
        ]);

        $sharstory = new SharStory([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'class_of' => $request->get('class_of'),
            'message' => $request->get('message')
        ]);

        $sharstory->save();
        return redirect('/sharstory')->with('success', 'SharStory has been added');
    }

    public function create()
    {
        return view('sharstory.create');
    }

    public function edit($id)
    {
        $sharstory = SharStory::find($id);
        return view('sharstory.edit', compact('sharstory'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'class_of' => 'required',
            'message' => 'required'
        ]);

        $sharstory = SharStory::find($id);
        $sharstory->name = $request->get('name');
        $sharstory->email = $request->get('email');
        $sharstory->phone = $request->get('phone');
        $sharstory->class_of = $request->get('class_of');
        $sharstory->message = $request->get('message');
        $sharstory->save();
        return redirect('/sharstory')->with('success', 'SharStory has been updated');
    }

    public function destroy($id)
    {
        $sharstory = SharStory::find($id);
        $sharstory->delete();
        return redirect('/sharstory')->with('success', 'SharStory has been deleted');
    }
}
