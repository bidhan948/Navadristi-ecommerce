<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;
// use File;

class PublicationController extends Controller
{
    public function index()
    {
        // dd("hello");
        $publication = Publication::all();
        // dd($publication);
        return view('admin.publication.index', compact('publication'));
    }
    public function create()
    {
        return view('admin.publication.create');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required|unique:publications|max:255',
            'description' => 'required',
            'auth_name' => 'required',
            'cover_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'public_year' => 'required',
            'file' => ['required', 'mimes:pdf,docx', 'max:2048'],

        ]);
        $publication = new Publication;
        if ($request->hasfile('cover_img')) {
            $file = $request->file('cover_img');
            $extenstion = $file->getClientOriginalExtension();
            $covername = time().'.'.$extenstion;
            $file->move('public/uploads/publication/', $covername);
            
            // $file = $request->file('cover_img');
            // $extenstion = $file->getClientOriginalExtension();
            // $coverimg = time() . '.' . $extenstion;
            // $file->move('uploads/publication/', $coverimg);
        }
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('public/uploads/publication/', $filename);
            
            // $file = $request->file('file');
            // $extenstion = $file->getClientOriginalExtension();
            // $filename = time() . '.' . $extenstion;
            // $file->move('uploads/publication/', $filename);
        }
        Publication::create($request->except('cover_img', 'file') + [
            'cover_img' => $covername ?? '',
            'file' => $filename ?? '',
        ]);
        return redirect()->back()->with('status', 'Publication Add Successfully');
    }
    public function edit($id)
    {
        // dd($id);
        $publication = Publication::find($id);
        return view('admin.publication.edit', compact('publication'));
    }
    public function update(Request $request, $id)
    {
        $publication = Publication::find($id);
        $oldCover = $publication->cover_img;
        $oldFile = $publication->file;
        $request->validate([
            'title' => ['required', Rule::unique('publications')->ignore($id)],
            'description' => 'required',
            'auth_name' => 'required',
            'public_year' => 'required',

        ]);
        $publication = new Publication;
        if ($request->hasfile('cover_img')) {
            $file = $request->file('cover_img');
            $extenstion = $file->getClientOriginalExtension();
            $coverimg = time() . '.' . $extenstion;
            $file->move('uploads/publication/', $coverimg);
            if (File::exists(public_path('uploads/publication/' . $oldCover))) {
                File::delete(public_path('uploads/publication/' . $oldCover));
            }
        }

        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extenstion;
            $file->move('uploads/publication/', $filename);
            if (File::exists(public_path('uploads/publication/' . $oldFile))) {
                File::delete(public_path('uploads/publication/' . $oldFile));
            }
        }

        Publication::query()->where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'auth_name' => $request->auth_name,
            'public_year' => $request->public_year,
            'cover_img' => $coverimg ?? $oldCover,
            'file' => $filename ?? $oldFile,
        ]);

        return redirect()->back()->with('status', 'Publication Updated Successfully');
    }
    public function delete($id)
    {
        $publication = Publication::find($id);
        $coverdestination = 'uploads/publication/' . $publication->cover_img;
        $filedestination = 'uploads/publication/' . $publication->file;

        if (File::exists($coverdestination)) {
            File::delete($coverdestination);
        }
        if (File::exists($filedestination)) {
            File::delete($filedestination);
        }
        $publication->delete();
        return redirect()->back()->with('status', 'Pu Successfully');
    }
}
