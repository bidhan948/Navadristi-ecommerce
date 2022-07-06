<?php

namespace App\Http\Controllers;

use App\Models\Specialities;
// use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SpecialitiesController extends Controller
{
    public function index()
    {
        // dd('hello ');
        $specialities = Specialities::all();
        // dd($service);
        return view('admin.specialities.index', compact('specialities'));
    }

    public function create()
    {
        return view('admin.specialities.create');
    }

    public function store(Request $request)
    {

        // echo "<pre>";
        // print_r($request->all());
        $specialities = new Specialities();
        $specialities->name = $request->input('name');
        $specialities->description = $request->input('description');
        $specialities->symptoms = $request->input('symptoms');
        $specialities->treatment_options = $request->input('treatment_options');

        // dd($request->treatment_options);

        // Incon 
        if ($request->hasfile('icon')) {
            $file = $request->file('icon');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extenstion;
            $file->move('public/uploads/specialities/', $filename);
            $specialities->icon = $filename;
        }

        //    Images 
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extenstion;
            $file->move('public/uploads/specialities/', $filename);
            $specialities->image = $filename;
        }
        $specialities->save();
        return redirect()->back()->with('status', 'Specialities Add Successfully');
    }


    // Edit 
    public function edit($id)
    {
        // dd($id);
        $specialities = Specialities::find($id);
        // dd($service);
        return view('admin.specialities.edit', compact('specialities'));
    }
    public function update(Request $request, $id)
    {
        $specialities = Specialities::find($id);
        $specialities->name = $request->input('name');
        $specialities->description = $request->input('description');
        $specialities->symptoms = $request->input('symptoms');
        $specialities->treatment_options = $request->input('treatment_options');

        // Update icon
        if ($request->hasfile('icon')) {

            $destination = 'upload/specialities' . $specialities->icon;
            if (File::exists($destination)) {
                File::delete($destination);
            }


            $file = $request->file('icon');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extenstion;
            $file->move('public/uploads/specialities/', $filename);
            $specialities->icon = $filename;
        }
        // else{

        // }

        // Update images
        if ($request->hasfile('image')) {

            $destination = 'upload/specialities' . $specialities->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }


            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extenstion;
            $file->move('public/uploads/specialities/', $filename);
            $specialities->image = $filename;
        }
        $specialities->update();
        return redirect()->back()->with('status', 'Specialities Update Successfully');
    }


    public function delete($id)
    {
        $specialities = Specialities::find($id);
        $destinationicon = 'public/uploads/specialities/' . $specialities->icon;

        if (File::exists($destinationicon)) {
            File::delete($destinationicon);
        }


        $destination = 'public/uploads/specialities/' . $specialities->image;

        if (File::exists($destination)) {
            File::delete($destination);
        }

        $specialities->delete();
        return redirect()->back()->with('status', 'Specialities Delete Successfully');
    }
}
