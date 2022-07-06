<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeSlider;
use Illuminate\Support\Facades\File;
// use App\Models\HomeSlider;

class SliderController extends Controller
{
    public function index(){
        // dd('hello ');

        $sliders = HomeSlider::all();
        // dd($sliders);
        return view('admin.slider.index', compact('sliders'));
    }

    public function create(){
        return view('admin.slider.create');
    }
    public function store(Request $request){
        $validated = $request->validate([
        'title' => 'required',
        'description' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

        // echo "<pre>";
        // print_r($request->all());
        $slider = new HomeSlider;
        $slider->title = $request->input('title');
        $slider->description = $request->input('description');

        // $slider->image = $request->input('image');
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $name=$file->getClientOriginalName();
            $filename = $name.'.'.time().'.'.$extenstion;
            $file->move('public/uploads/slider/', $filename);
            $slider->image = $filename;
        }
        $slider->save();
        return redirect()->back()->with('status','Slider Add Successfully');
        // return view('admin.slider.create');
    }

    // public function edit($id){
    //     $slider = HomeSlider::find($id);
    //     return view('admin.slider.edit');
    // }


    public function edit($id){
        $slider = HomeSlider::find($id);
        // dd($slider);
        return view('admin.slider.edit', compact('slider'));
    }
    public function update(Request $request, $id){
        $slider = HomeSlider::find($id);
        $slider->title = $request->input('title');
        $slider->description = $request->input('description');

        // update images
        if($request->hasfile('image'))
        {
            $destination = 'uploads/slider/'.$slider->image;
            if(File::exists($destination)){
                File::delete($destination);
            }


            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/slider/', $filename);
            $slider->image = $filename;
        }
        $slider->update();
        return redirect()->back()->with('status','Slider Update Successfully');
    }

    public function delete($id){
        $slider = HomeSlider::find($id);
        $destination = 'uploads/slider/'.$slider->image;

        if(File::exists($destination)){
            File::delete($destination);
        }
        $slider->delete();
        return redirect()->back()->with('status','Slider Delete Successfully');

    }

}
