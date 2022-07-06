<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{
    public function index(){
        $testimonial = Testimonial::all();
        return view('admin.testimonial.index', compact('testimonial'));
    }

    // Create
    public function create(){
        return view('admin.testimonial.create');
    }

    // Store
    public function store(Request $request){

        // echo "<pre>";
        // print_r($request->all());
        $testimonial = new Testimonial;
        $testimonial->name = $request->input('name');
        $testimonial->position = $request->input('position');
        $testimonial->description = $request->input('description');

        // $service->image = $request->input('image');
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('public/uploads/testimonial/', $filename);
            $testimonial->image = $filename;
        }
        $testimonial->save();
        return redirect()->back()->with('status','Testimonial  Add Successfully');

    }
    public function edit($id){
        // dd($id);
        $testimonial = Testimonial::find($id);
        // dd($news);
        return view('admin.testimonial.edit', compact('testimonial'));
    }
    public function update(Request $request, $id){
        $testimonial = Testimonial::find($id);
        $testimonial->title = $request->input('name');
        $testimonial->position = $request->input('position');
        $testimonial->description = $request->input('description');

        // Update images
        if($request->hasfile('image'))
        {

            $destination = 'upload/testimonial'.$testimonial->image;

            if(File::exists($destination)){
                File::delete($destination);
            }


            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('public/uploads/testimonial/', $filename);
            $testimonial->image = $filename;
        }
        $testimonial->update();
        return redirect()->back()->with('status','Testimonial Update Successfully');
    }

    public function delete($id){
        $testimonial = Testimonial::find($id);
        $destination = 'public/uploads/testimonial/'.$testimonial->image;

        if(File::exists($destination)){
            File::delete($destination);
        }
        $testimonial->delete();
        return redirect()->back()->with('status','Testimonial Delete Successfully');

    }
}
