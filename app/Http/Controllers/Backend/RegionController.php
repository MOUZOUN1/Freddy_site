<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function index()
    {
        $regions = Region::latest()->get();
        return view('backend.regions.index', compact('regions'));
    }

    public function create()
    {
        return view('backend.regions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'localisation' => 'nullable|string',
            'superficie' => 'nullable|numeric',
            'population' => 'nullable|numeric',
        ]);

        Region::create($request->all());

        return redirect()->route('admin.regions.index')->with('success', 'Région créée avec succès.');
    }

    public function edit(Region $region)
    {
        return view('backend.regions.edit', compact('region'));
    }

    public function update(Request $request, Region $region)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'localisation' => 'nullable|string',
            'superficie' => 'nullable|numeric',
            'population' => 'nullable|numeric',
        ]);

        $region->update($request->all());

        return redirect()->route('admin.regions.index')->with('success', 'Région mise à jour avec succès.');
    }

    public function show(Region $region)
    {
        return view('backend.regions.show', compact('region'));
    }

    public function destroy(Region $region)
    {
        $region->delete();
        return redirect()->route('admin.regions.index')->with('success', 'Région supprimée avec succès.');
    }
}
