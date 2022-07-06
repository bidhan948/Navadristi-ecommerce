<?php

namespace App\Http\Controllers;

use App\Models\News;
// use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    public function index(){
        // dd("Hello");
        $news = News::all();
        // dd($news);
        $news = News::orderBy('created_at','DESC')->get();
        return view('admin.news.index', compact('news'));

    }
    // Create
    public function create(){
        return view('admin.news.create');
    }

    // Store
    public function store(Request $request){

        // echo "<pre>";
        // print_r($request->all());
        $news = new News;
        $news->title = $request->input('title');
        $news->description = $request->input('description');

        // $service->image = $request->input('image');
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('public/uploads/news/', $filename);
            $news->image = $filename;
        }
        $news->save();
        return redirect()->back()->with('status','News & Event Add Successfully');

    }
    public function edit($id){
        // dd($id);
        $news = News::find($id);
        // dd($news);
        return view('admin.news.edit', compact('news'));
    }
    public function update(Request $request, $id){
        $news = News::find($id);
        $news->title = $request->input('title');
        $news->description = $request->input('description');

        // Update images
        if($request->hasfile('image'))
        {

            $destination = 'public/uploads/news'.$news->image;

            if(File::exists($destination)){
                File::delete($destination);
            }


            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('public/uploads/news/', $filename);
            $news->image = $filename;
        }
        $news->update();
        return redirect()->back()->with('status','News & Event Update Successfully');
    }

    public function delete($id){
        $news = News::find($id);
        $destination = 'public/uploads/news/'.$news->image;

        if(File::exists($destination)){
            File::delete($destination);
        }
        $news->delete();
        return redirect()->back()->with('status','News & Event Delete Successfully');

    }
}
