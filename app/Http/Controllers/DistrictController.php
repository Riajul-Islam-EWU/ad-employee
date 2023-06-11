<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function index()
    {
        $districts = District::all();
        return view('districts.index', compact('districts'));
    }

    public function create()
    {
        $divisions = Division::all();
        return view('districts.create', compact('divisions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'district_code' => 'required',
            'division_id' => 'required',
        ]);

        District::create([
            'name' => $request->name,
            'district_code' => $request->district_code,
            'division_id' => $request->division_id,
        ]);

        return redirect()->route('districts.index')->with('success', 'District created successfully.');
    }

    public function edit(District $district)
    {
        $divisions = Division::all();
        return view('districts.edit', compact('district', 'divisions'));
    }

    public function update(Request $request, District $district)
    {
        $request->validate([
            'name' => 'required',
            'district_code' => 'required',
            'division_id' => 'required',
        ]);

        $district->name = $request->name;
        $district->district_code = $request->district_code;
        $district->division_id = $request->division_id;
        $district->save();

        return redirect()->route('districts.index')->with('success', 'District updated successfully.');
    }


    public function show(District $district)
    {
        return view('districts.show', compact('district'));
    }

    public function destroy(District $district)
    {
        $district->delete();

        return redirect()->route('districts.index')->with('success', 'District deleted successfully.');
    }
}
