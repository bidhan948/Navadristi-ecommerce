<?php

namespace App\Http\Controllers\package;

use App\Http\Controllers\Controller;
use App\Models\e_commerce\package;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PackageController extends Controller
{
    public function index(): View
    {
        return view('e_commerce.package.package', [
            'packages' => package::query()->get()
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $attribute = $request->validate(['name' => 'required|unique:packages', 'description' => 'present']);
        package::create($attribute);
        toast("package added successfully", "success");
        return redirect()->back();
    }

    public function update(Request $request, package $package): RedirectResponse
    {
        $attribute = $request->validate(
            [
                'name' => ['required', Rule::unique('packages')->ignore($package)],
                'description' => 'present'
            ]
        );

        $package->update($attribute);
        toast("Package updated successfully", "success");
        return redirect()->back();
    }
}
