<?php

namespace App\Http\Controllers\package;

use App\Http\Controllers\Controller;
use App\Models\e_commerce\package;
use App\Models\e_commerce\package_detail;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PackageController extends Controller
{
    public function index(): View
    {
        return view('e_commerce.package.package', [
            'Parentpackages' => package::query()->whereNull('package_id')->get(),
            'packages' => package::query()->with('Parent')->get()
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $attribute = $request->validate(['name' => 'required|unique:packages', 'description' => 'present', 'package_id' => 'present']);
        package::create($attribute);
        toast("package added successfully", "success");
        return redirect()->back();
    }

    public function update(Request $request, package $package): RedirectResponse
    {
        $attribute = $request->validate(
            [
                'name' => ['required', Rule::unique('packages')->ignore($package)],
                'description' => 'present',
                'package_id' => 'present'
            ]
        );

        $package->update($attribute);
        toast("Package updated successfully", "success");
        return redirect()->back();
    }

    public function detailIndex(): View
    {
        return view('e_commerce.package.package-detail', [
            'packages' => package::query()->get(),
            'package_details' => package_detail::query()->with('Package')->get()
        ]);
    }

    public function detailStore(Request $request): RedirectResponse
    {
        $attribute = $request->validate(
            [
                'name' => 'required|unique:package_details',
                'price' => 'required',
                'package_id' => 'required|exists:packages,id',
                'description' => 'present'
            ]
        );

        package_detail::create($attribute);
        toast("Package detail added successfully", 'success');
        return redirect()->back();
    }
}
