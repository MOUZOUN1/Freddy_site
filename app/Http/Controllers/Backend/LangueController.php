<?php

namespace App\Http\Controllers;

use App\Models\Langue;
use Illuminate\Http\Request;

class LangueController extends Controller
{
    public function index()
    {
        $langues = Langue::latest()->get();
        return view('backend.langues.index', compact('langues'));
    }

    public function create()
    {
        return view('backend.langues.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomlangue' => 'required|string|max:255',
            'codelangue' => 'required|string|max:10|unique:langues,codelangue',
            'description' => 'nullable|string',
        ]);

        Langue::create($request->all());

        return redirect()->route('admin.langues.index')->with('success', 'Langue créée avec succès.');
    }

    public function edit(Langue $langue)
    {
        return view('backend.langues.edit', compact('langue'));
    }

    public function update(Request $request, Langue $langue)
    {
        $request->validate([
            'nomlangue' => 'required|string|max:255',
            'codelangue' => 'required|string|max:10|unique:langues,codelangue,' . $langue->id,
            'description' => 'nullable|string',
        ]);

        $langue->update($request->all());

        return redirect()->route('admin.langues.index')->with('success', 'Langue mise à jour avec succès.');
    }

    public function show(Langue $langue)
    {
        return view('backend.langues.show', compact('langue'));
    }

    public function destroy(Langue $langue)
    {
        $langue->delete();
        return redirect()->route('admin.langues.index')->with('success', 'Langue supprimée avec succès.');
    }
}
