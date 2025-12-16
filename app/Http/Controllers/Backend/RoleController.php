<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::latest()->get();
        return view('backend.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('backend.roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'slug' => 'required|string|max:255|unique:roles,slug',
            'name' => 'required|string|max:255',
            'permissions' => 'nullable|json',
        ]);

        Role::create([
            'slug' => $request->slug,
            'name' => $request->name,
            'permissions' => json_decode($request->permissions, true) ?? [],
        ]);

        return redirect()->route('admin.roles.index')->with('success', 'Rôle créé avec succès.');
    }

    public function edit(Role $role)
    {
        return view('backend.roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'slug' => 'required|string|max:255|unique:roles,slug,' . $role->id,
            'name' => 'required|string|max:255',
            'permissions' => 'nullable|json',
        ]);

        $role->update([
            'slug' => $request->slug,
            'name' => $request->name,
            'permissions' => json_decode($request->permissions, true) ?? [],
        ]);

        return redirect()->route('admin.roles.index')->with('success', 'Rôle mis à jour avec succès.');
    }

    public function show(Role $role)
    {
        return view('backend.roles.show', compact('role'));
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.roles.index')->with('success', 'Rôle supprimé avec succès.');
    }
}
