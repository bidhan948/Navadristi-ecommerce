<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Component\Finder\Finder;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        // dd($category);
        return view('admin.category.index', compact('category'));
    }
    public function create()
    {
        return view('admin.category.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $category = new Category();
        $category->name = $request->input('name');
        $category->save();
        return redirect()->route('category')->with('status', 'Add category successfully');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->save();
        return redirect()->route('category')->with('status', 'Update category successfully');
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('category')->with('status', ' Category delete successfully');
    }
}
