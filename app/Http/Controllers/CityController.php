<?php

namespace App\Http\Controllers;
use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request;

class CityController extends Controller
{
    
    public function index()
    {
        $city = City::with('province')->paginate(10);
        
        return view('pages.city.index', compact('city'));
    }
    public function create()
    {
        $provinces = province::all();
        return view('pages.city.create', compact('provinces'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'province_id' => 'required|exists:provinces,id',
        ]);
    
        City::create($validatedData);
        
        return redirect()->route('city.index');
    }
    public function edit(City $city)
    {
        $provinces = province::all();
        return view('pages.city.edit', compact('city', 'provinces'));
    }
    public function update(Request $request, City $city)
    {
        $city->fill($request->all())->update();

        return redirect()->route('city.index')->with('success', 'City updated successfully');
    }
    public function destroy(City $city)
    {
        $city->delete();               

        return redirect()->back()->with('success', 'City deleted successfully');
    }
}
