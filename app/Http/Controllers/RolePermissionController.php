<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('auth.manage-roles.index', compact('roles'));
    }

    public function create()
    {
        // Fetch all permissions
        $permissions = Permission::all()->groupBy(function($permission) {
            // Extract the entity from the permission name
            $parts = explode(' ', $permission->name);
            return $parts[1] ?? 'general'; // Group by entity, default to 'general'
        });
        return view('auth.manage-roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        //Validate the input
        $request->validate([
            'name' => 'required|unique:roles,name',
            'permissions' => 'array',
            'permissions.*' => 'exists:permissions,name', // Ensure each permission exists in the database
        ]);

        // Create the role
        $role = Role::create(['name' => $request->name]);

        // Assign permissions to the role
        if ($request->has('permissions')) {
            $role->givePermissionTo($request->permissions);
            dd('done');
        }

        return redirect()->route('manage-roles.index')->with('success', 'Role created successfully.');
    }

    public function show(Role $role)
    {
        $permissions = Permission::all();
        return view('auth.manage-roles.show', compact('role', 'permissions'));
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('auth.manage-roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $validated = $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
            'permissions' => 'required|array',
        ]);

        $role->update(['name' => $validated['name']]);
        $role->syncPermissions($validated['permissions']);

        return redirect()->route('manage-roless.index')->with('success', 'Role updated successfully.');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('manage-roless.index')->with('success', 'Role deleted successfully.');
    }
}
