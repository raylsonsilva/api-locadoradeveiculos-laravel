<?php

namespace BitzenTecnologia\Http\Controllers\Api;

use BitzenTecnologia\Http\Requests\UserResquest;
use BitzenTecnologia\User;
use Illuminate\Http\Request;
use BitzenTecnologia\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function index()
    {
        return User::all();
    }

    public function store(UserResquest $request)
    {
        foreach ($request->roles as $role)
        {
            $roles[] = Role::where('name', $role)->first();
        }
        if($roles!=null)
        {
            $user = User::create($request->all());
            $user->syncRoles($roles);
            return $user;
        }
    }

    public function show(User $user)
    {
        return $user;
    }

    public function update(UserResquest $request, User $user)
    {
        foreach ($request->roles as $role)
        {
            $roles[] = Role::where('name', $role)->first();
        }
        if($roles!=null)
        {
            $user->update($request->all());
            $user->syncRoles($roles);
            return $user;
        }
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->noContent();
    }
}
