<?php

namespace App\Http\Controllers;

use App\Models\About;
// use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    public function index()
    {

        $about = About::first();
        return view('admin.about.create', compact('about'));
    }
    // Create
    public function edit($id)
    {
        $about = About::query()->where('id', $id)->first();
        return view('admin.about.create', ['about' => $about]);
    }


    // public function edit($id){
    //     $about = About::find($id);
    //     return view('admin.about.create', compact('about'));
    // }

    public function update(Request $request, $id){

        // dd($request->all());

        $about = About::find($id);
        $about->title = $request->input('title');
        $about->description = $request->input('description');
        $about->phone = $request->input('phone');
        $about->email = $request->input('email');
        $about->address = $request->input('address');
        $about->fb_url = $request->input('fb_url');
        $about->tw_url = $request->input('tw_url');
        $about->in_url = $request->input('in_url');
        $about->w_link = $request->input('w_link');
        $about->v_link = $request->input('v_link');

        if($request->hasfile('image'))
        {
            $destination = 'public/uploads/about'.$about->image;

            if(File::exists($destination)){
                File::delete($destination);
            }


            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('public/uploads/about/', $filename);
            $about->image = $filename;
        }
        $about->save();
        return redirect()->back()->with('status', 'Message Update  Successfully');
    }
}