<?php

namespace BitzenTecnologia\Http\Controllers\Auth;

use Illuminate\Http\Request;
use BitzenTecnologia\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;


class PermissionController extends Controller
{

    public function index()
    {
        return Permission::all();
    }

    public function store(Request $request)
    {
        return Permission::create(['name' => $request->name,'guard_name' => $request->guard_name]);
    }

    public function show(Permission $permission)
    {
        return $permission;
    }

    public function update(Request $request, Permission $permission)
    {
        $permission->update(['name' => $request->name,'guard_name' => $request->guard_name]);
        return $permission;
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return response()->noContent();
    }
}
