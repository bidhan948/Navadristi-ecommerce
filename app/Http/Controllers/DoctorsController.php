<?php

namespace App\Http\Controllers;

use App\Models\Doctors;
// use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DoctorsController extends Controller
{
    public function index(){
        $doctor = Doctors::all();
        return view('admin.doctor.index', compact('doctor'));
    }
    public function create(){
        return view('admin.doctor.create');
    }
    public function store(Request $request){
        // echo "<pre>";
        // print_r($request->all());
        $doctor = new Doctors;
        // dd($doctor);
        $doctor->name = $request->input('name');
        $doctor->education = $request->input('education');
        $doctor->specialization = $request->input('specialization');
        $doctor->description = $request->input('description');
        $doctor->professional_experience = $request->input('professional_experience');
        $doctor->expertise = $request->input('expertise');
        $doctor->experience = $request->input('experience');

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('public/uploads/doctor/', $filename);
            $doctor->image = $filename;
        }
        $doctor->save();
        return redirect()->back()->with('status','Doctor Add Successfully');
    }
    public function edit($id){
        $doctor = Doctors::find($id);

        // dd($doctor);

        return view('admin.doctor.edit', compact('doctor'));
    }
    public function update(Request $request, $id){
        $doctor = Doctors::find($id);
        $doctor->name = $request->input('name');
        $doctor->education = $request->input('education');
        $doctor->specialization = $request->input('specialization');
        $doctor->description = $request->input('description');
        $doctor->professional_experience = $request->input('professional_experience');
        $doctor->expertise = $request->input('expertise');
        $doctor->experience = $request->input('experience');

        if($request->hasfile('image'))
        {
            $destination = 'public/upload/doctor'.$doctor->image;

            if(File::exists($destination)){
                File::delete($destination);
            }


            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('public/uploads/doctor/', $filename);
            $doctor->image = $filename;
        }
        $doctor->save();
        return redirect()->back()->with('status','Doctor Add Successfully');
    }

    public function delete($id){
        $doctor = Doctors::find($id);
        $destination = 'public/uploads/doctor/'.$doctor->image;

        if(File::exists($destination)){
            File::delete($destination);
        }
        $doctor->delete();
        return redirect()->back()->with('status','Doctor Delete Successfully');

    }
}
