<?php

namespace App\Http\Controllers;

use App\Models\Message;
// use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MessageController extends Controller
{
    public function index()
    {

        $message = Message::first();
        return view('admin.messagefrom.create', compact('message'));
    }
    // Create
    public function edit($id)
    {
        $message = Message::query()->where('id', $id)->first();
        return view('admin.messagefrom.create', ['message' => $message]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'position' => 'required',
            'message' => 'required',
        ]);

        $message = Message::find($request->id);
        $message->name = $data['name'];
        $message->position = $data['position'];
        $message->message = $data['message'];

        if ($request->hasfile('photo')) {
            $destination = 'public/uploads/message' . $message->photo;

            if (File::exists($destination)) {
                File::delete($destination);
            }


            $file = $request->file('photo');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extenstion;
            $file->move('public/uploads/message/', $filename);
            $message->photo = $filename;
        }
        $message->save();
        return redirect()->back()->with('status', 'Message Update  Successfully');
    }
}