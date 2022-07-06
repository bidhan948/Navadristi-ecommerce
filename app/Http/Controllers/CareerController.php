<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\position;
use App\Models\Resume;
use App\Models\Allcv;
use Illuminate\Http\Request;
use File;

class CareerController extends Controller
{
    public function index()
    {
        $career = Career::query()->with('position')->get();
        

        return view('admin.career.index', compact('career'));
    }
    public function viewcv()
    {
        $resume = Resume::query()->with('position')->get();
        // dd($resume);
        return view('admin.career.view-cv', compact('resume'));
    }
    
     public function allcv()
    {
        $allcv = Allcv::query()->with('position')->get();
        // dd($resume);
        return view('admin.career.allcv', compact('allcv'));
    }
 
    public function create()
    {
        return view('admin.career.create', ['positions' => position::query()->get()]);
    }
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'position_id' => 'required',
            'education_qualification' => 'required',
            'vacancy_no' => 'required',
            'experience' => 'required',
            'deadline' => 'required',
            'job_description' => 'required',
            'image' => 'required',
        ]);


        $career = new Career;
        $career->title = $request->input('title');
        $career->position_id = $request->input('position_id');
        $career->education_qualification = $request->input('education_qualification');
        $career->vacancy_no = $request->input('vacancy_no');
        $career->experience = $request->input('experience');
        $career->deadline = $request->input('deadline');
        $career->job_description = $request->input('job_description');

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extenstion;
            $file->move('public/uploads/career/', $filename);
            $career->image = $filename;
        }
        $career->save();
        return redirect()->route('career')->with('status', 'Careers Add Successfully');
    }

    public function edit($id)
    {
        $career = Career::findOrFail($id);

        return view('admin.career.edit', ['career' => $career->load('position'), 'positions' => position::query()->get()]);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required',
            'position_id' => 'required',
            'education_qualification' => 'required',
            'vacancy_no' => 'required',
            'experience' => 'required',
            'deadline' => 'required',
            'job_description' => 'required',
            // 'image' => 'required',
        ]);


        $career = Career::find($id);
        $career->title = $request->input('title');
        $career->position_id = $request->input('position_id');
        $career->education_qualification = $request->input('education_qualification');
        $career->vacancy_no = $request->input('vacancy_no');
        $career->experience = $request->input('experience');
        $career->deadline = $request->input('deadline');
        $career->job_description = $request->input('job_description');
        // Update images
        if ($request->hasfile('image')) {

            $destination = 'public/uploads/career' . $career->image;

            if (File::exists($destination)) {
                File::delete($destination);
            }


            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extenstion;
            $file->move('public/uploads/career/', $filename);
            $career->image = $filename;
        }
        $career->update();
        return redirect()->route('career')->with('status', 'Career Update Successfully');
    }

    public function delete($id)
    {
        $career = Career::find($id);

        $career->delete();
        return redirect()->back()->with('status', 'Career Delete Successfully');
    }
}
