<?php

namespace App\Http\Controllers;

use App\Models\Team;
// use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TeamController extends Controller
{
    public function index(){
        // dd("Hello");
        $team = Team::all();
        return view('admin.team.index', compact('team'));

    }
    // Create
    public function create(){
        return view('admin.team.create');
    }

    // Store
    public function store(Request $request){

        // echo "<pre>";
        // print_r($request->all());
        $team = new Team;
        $team->name = $request->input('name');
        $team->position = $request->input('position');
        $team->description = $request->input('description');
        $team->fb_url = $request->input('facebook');
        $team->tw_url = $request->input('instagram');
        $team->in_url = $request->input('twitter');

        // $service->image = $request->input('image');
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('public/uploads/team/', $filename);
            $team->image = $filename;
        }
        $team->save();
        return redirect()->back()->with('status','Team member add successfully');

    }
    public function edit($id){
        // dd($id);
        $team = Team::find($id);
        // dd($news);
        return view('admin.team.edit', compact('team'));
    }
    public function update(Request $request, $id){
        $team = Team::find($id);
        $team->name = $request->input('name');
        $team->position = $request->input('position');
        $team->description = $request->input('description');
        $team->fb_url = $request->input('facebook');
        $team->tw_url = $request->input('instagram');
        $team->in_url = $request->input('twitter');

        // Update images
        if($request->hasfile('image'))
        {

            $destination = 'public/uploads/team'.$team->image;

            if(File::exists($destination)){
                File::delete($destination);
            }


            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('public/uploads/team/', $filename);
            $team->image = $filename;
        }
        $team->update();
        return redirect()->back()->with('status','Team member update successfully');
    }

    public function delete($id){
        $team = Team::find($id);
        $destination = 'public/uploads/team/'.$team->image;

        if(File::exists($destination)){
            File::delete($destination);
        }
        $team->delete();
        return redirect()->back()->with('status','Team member delete successfully');

    }
}
