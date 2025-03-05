<?php

namespace App\Http\Controllers;

use App\Mail\AdminShareStory;
use App\Mail\UserShareStory;
use App\Models\ShareStory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ShareStoryController extends Controller
{
    //

    public function index()
    {
        return view('sharestory.index');
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

        $sharestory = new ShareStory([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'class_of' => $request->get('class_of'),
            'message' => $request->get('message')
        ]);

        $sharestory->save();
        // Send email to user
        Mail::to($sharestory->email)->send(new UserShareStory($sharestory));

        // Assuming this is where the story is saved
        $shareStory = ShareStory::create($request->all());

        // Update this line to pass the $shareStory to the mail
        Mail::to(User::find(2))->send(new AdminShareStory($shareStory));

        return redirect('/alumnis')->with('success', 'sharestory has been added');
    }

    public function create()
    {
        return view('sharestory.create');
    }

    public function edit($id)
    {
        $sharestory = ShareStory::find($id);
        return view('sharestory.edit', compact('sharestory'));
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

        $sharestory = ShareStory::find($id);
        $sharestory->name = $request->get('name');
        $sharestory->email = $request->get('email');
        $sharestory->phone = $request->get('phone');
        $sharestory->class_of = $request->get('class_of');
        $sharestory->message = $request->get('message');
        $sharestory->save();
        return redirect('/sharestory')->with('success', 'sharestory has been updated');
    }

    public function destroy($id)
    {
        $sharestory = ShareStory::find($id);
        $sharestory->delete();
        return redirect('/sharestory')->with('success', 'sharestory has been deleted');
    }
}
