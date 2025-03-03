<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Models\Feature;
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
        $features = Feature::all();
        return view('permissions.create', compact('permissions', 'features'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name|max:255',
            'feature_id' => 'required|exists:features,id',
        ]);

        Permission::create([
            'name' => $request->name,
            'feature_id' => $request->feature_id,
        ]);

        return redirect()->route('permissions.create')->with('success', 'Permission created successfully.');
    }

    public function show(Permission $permission)
    {
        //
    }

    public function edit(Permission $permission)
    {
        $features = Feature::all();
        return view('permissions.edit', compact('permission', 'features'));
    }

    public function update(Request $request, Permission $permission)
    {


        $permission->update([
            'name' => $request->name,
            'feature_id' => $request->feature_id,
        ]);

        return redirect()->route('permissions.create')->with('success', 'Permission updated successfully.');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();

        return redirect()->route('permissions.create')->with('success', 'Permission deleted successfully.');
    }
}
