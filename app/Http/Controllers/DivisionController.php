<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    public function index()
    {
        $divisions = Division::all();
        return view('divisions.index', compact('divisions'));
    }

    public function create()
    {
        return view('divisions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'division_code' => 'required',
        ]);

        Division::create([
            'name' => $request->name,
            'division_code' => $request->division_code,
        ]);

        return redirect()->route('divisions.index')->with('success', 'Division created successfully.');
    }

    public function edit(Division $division)
    {
        return view('divisions.edit', compact('division'));
    }

    public function update(Request $request, Division $division)
    {
        $request->validate([
            'name' => 'required',
            'division_code' => 'required',
        ]);

        $division->update([
            'name' => $request->name,
            'division_code' => $request->division_code,
        ]);

        return redirect()->route('divisions.index')->with('success', 'Division updated successfully.');
    }

    public function show(Division $division)
    {
        return view('divisions.show', compact('division'));
    }

    public function destroy(Division $division)
    {
        $division->delete();

        return redirect()->route('divisions.index')->with('success', 'Division deleted successfully.');
    }
}
