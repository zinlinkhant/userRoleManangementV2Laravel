<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('permissions.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name|max:255',
        ]);

        Permission::create([
            'name' => $request->name,
        ]);

        return redirect()->route('permissions.create')->with('success', 'Permission created successfully.');
    }

    public function show(Permission $permission)
    {
        //
    }

    public function edit(Permission $permission)
    {
        return view('permissions.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name,' . $permission->id . '|max:255',
        ]);

        $permission->update([
            'name' => $request->name,
        ]);

        return redirect()->route('permissions.create')->with('success', 'Permission updated successfully.');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();

        return redirect()->route('permissions.create')->with('success', 'Permission deleted successfully.');
    }
}
