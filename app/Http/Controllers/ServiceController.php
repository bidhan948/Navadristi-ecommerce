<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Services;
// use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\File;

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\HomeSlider;
use Illuminate\Support\Facades\File;


class ServiceController extends Controller
{


    public function index(){
        // $service = Services::all();
        // return view('admin.service.index', compact('service'));
        $services = Services::query()->with('Categories')->get();
        return view('admin.service.index', compact('services'));
    }

    public function create(){
        return view('admin.service.create', [
            'categories' => Category::query()->get()
        ]);
    }

    public function store(Request $request){

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
        ]);
        $service = new Services;
        $service->title = $request->input('title');
        $service->category_id = $request->input('category');
        $service->description = $request->input('description');

        // $service->image = $request->input('image');
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('public/uploads/service/', $filename);
            $service->image = $filename;
        }
        $service->save();
        return redirect()->route('service')->with('status','Service Add Successfully');

    }




    public function edit($id){
        $service = Services::query()->where('id', $id)->with('categories')->first();
        // dd($service);
        return view('admin.service.edit', [
            'categories' => Category::query()->get(),
            'service' => $service
        ]);
    }
    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
        ]);
        
        $service = Services::find($id);
        $service->title = $request->input('title');
        $service->category_id = $request->input('category');
        $service->description = $request->input('description');

        // Update images
        if($request->hasfile('image'))
        {

            $destination = 'upload/service'.$service->image;
            if(File::exists($destination)){
                File::delete($destination);
            }


            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('public/uploads/service/', $filename);
            $service->image = $filename;
        }
        $service->update();
        return redirect()->route('service')->with('status','Service Update Successfully');
    }

    public function delete($id){
        $service = Services::find($id);
        $destination = 'public/uploads/service/'.$service->image;

        if(File::exists($destination)){
            File::delete($destination);
        }
        $service->delete();
        return redirect()->back()->with('status','Slider Delete Successfully');

    }
}