<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public function index()
    {
        $province = Province::paginate(10);
        return view('pages.province.index', compact('province'));
    }

    public function create()
    {
        return view('pages.province.create');
    }

    public function store(Request $request, Province $province)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);
        Province::create($validatedData);
        
        return redirect()->route('province.index');
    }

    public function edit(Province $province)
    {
        return view('pages.province.edit', compact('province'));
    }

    public function update(Request $request, Province $province)
    {
        $province->fill($request->all())->update();

        return redirect()->route('province.index')->with('success', 'Province updated successfully');
    }

    public function destroy(Province $province)
    {
        $province->delete();               

        return redirect()->back()->with('success', 'Province deleted successfully');
    }
}
