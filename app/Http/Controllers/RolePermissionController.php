<?php

namespace App\Http\Controllers;

use App\Models\Role_permission;
use App\Http\Requests\StoreRole_permissionRequest;
use App\Http\Requests\UpdateRole_permissionRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        $rolePermissions = Role_permission::with(['role', 'permission'])->get();
        return view('role_permissions.create', compact('roles', 'permissions', 'rolePermissions'));
    }

    /*************  ✨ Codeium Command ⭐  *************/
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRole_permissionRequest  $request
     * @return \Illuminate\Http\Response
     */
    /******  e81016eb-edd7-4c9c-8fbb-7e7542213910  *******/
    public function store(Request $request)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
            'permission_id' => 'required|exists:permissions,id',
        ]);

        // Check if the role-permission pair already exists
        $exists = Role_permission::where('role_id', $request->role_id)
            ->where('permission_id', $request->permission_id)
            ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'This role already has this permission.');
        }

        // Create new role-permission entry
        Role_permission::create([
            'role_id' => $request->role_id,
            'permission_id' => $request->permission_id,
        ]);

        return redirect()->back()->with('success', 'Permission assigned to role successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Role_permission $role_permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role_permission $rolePermission)
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('role_permissions.edit', compact('rolePermission', 'roles', 'permissions'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role_permission $rolePermission)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
            'permission_id' => 'required|exists:permissions,id',
        ]);

        // Prevent duplicate entries
        $exists = Role_permission::where('role_id', $request->role_id)
            ->where('permission_id', $request->permission_id)
            ->where('id', '!=', $rolePermission->id)
            ->exists();

        if ($exists) {
            return redirect()->route('role_permissions.edit', $rolePermission->id)->with('error', 'This role already has this permission.');
        }

        $rolePermission->update([
            'role_id' => $request->role_id,
            'permission_id' => $request->permission_id,
        ]);

        return redirect()->route('role_permissions.create')->with('success', 'Role permission updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role_permission $rolePermission)
    {
        $rolePermission->delete();
        return redirect()->route('role_permissions.create')->with('success', 'Role permission deleted successfully.');
    }
}