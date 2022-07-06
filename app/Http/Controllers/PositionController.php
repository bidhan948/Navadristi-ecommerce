<?php

namespace App\Http\Controllers;

use App\Models\position;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PositionController extends Controller
{
    public function index(): View
    {
        return view('admin.position.index', [
            'positions' => position::query()->get()
        ]);
    }

    public function create(): View
    {
        return view('admin.position.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validate = $request->validate(['name' => 'required|unique:positions', 'description' => 'present']);
        position::create($validate);
        return redirect()->back()->with('msg', "Position successfully saved");
    }

    public function edit(position $position): View
    {
        return view('admin.position.edit', ['position' => $position]);
    }

    public function update(Request $request, position $position): RedirectResponse
    {
        $validate = $request->validate([
            'name' => ['required', Rule::unique('positions')->ignore($position)],
            'description' => 'present'
        ]);

        $position->update($validate);
        return redirect()->route('position.index')->with('msg', 'Position updated successfully');
    }
}
