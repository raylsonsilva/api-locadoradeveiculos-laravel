<?php

namespace BitzenTecnologia\Http\Controllers\Auth;

use BitzenTecnologia\Http\Requests\RoleRequest;
use Illuminate\Http\Request;
use BitzenTecnologia\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    public function index()
    {
        return Role::all();
    }

    public function store(RoleRequest $request)
    {
        foreach ($request->permissions as $permission)
        {
            $permissions[] = Permission::where('name', $permission)->first();
        }
        if($permissions!=null)
        {
            $role = Role::create(['name' => $request->name,'guard_name' => $request->guard_name]);
            $role->syncPermissions($permissions);
            return $role;
        }
    }

    public function show(Role $role)
    {
        return $role;
    }

    public function update(Request $request, Role $role)
    {
        foreach ($request->permissions as $permission)
        {
            $permissions[] = Permission::where('name', $permission)->first();
        }
        if($permissions!=null)
        {
            $role->update(['name' => $request->name,'guard_name' => $request->guard_name]);
            $role->syncPermissions($permissions);
            return $role;
        }
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return response()->noContent();
    }
}
