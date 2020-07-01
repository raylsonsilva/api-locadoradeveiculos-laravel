<?php

namespace BitzenTecnologia\Http\Controllers\Auth;

use Illuminate\Http\Request;
use BitzenTecnologia\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    public function index()
    {
        return Role::all();
    }

    public function store(Request $request)
    {
        return Role::create(['name' => $request->name,'guard_name' => $request->guard_name]);
    }

    public function show(Role $role)
    {
        return $role;
    }

    public function update(Request $request, Role $role)
    {
        $role->update(['name' => $request->name,'guard_name' => $request->guard_name]);
        return $role;
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return response()->noContent();
    }
}
