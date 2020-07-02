<?php

namespace BitzenTecnologia\Http\Controllers\Api;

use BitzenTecnologia\Http\Requests\UserResquest;
use BitzenTecnologia\User;
use Illuminate\Http\Request;
use BitzenTecnologia\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function index()
    {
        if (!Auth::user()->hasRole(['manager','employe']))
        {
            throw new UnauthorizedException('403', 'You do not have the required authorization.');
        }

        return User::all();
    }

    public function store(UserResquest $request)
    {
        if (!Auth::user()->hasRole(['manager']))
        {
            throw new UnauthorizedException('403', 'You do not have the required authorization.');
        }

        foreach ($request->roles as $role)
        {
            $roles[] = Role::where('name', $role)->first();
        }
        if($roles!=null)
        {
            $user = User::create([
                'name' => request('name'),
                'email' => request('email'),
                'password' => bcrypt(request('password'))

            ]);
            $user->syncRoles($roles);
            return $user;
        }
    }

    public function show(User $user)
    {
        if (!Auth::user()->hasRole(['manager','employe']))
        {
            throw new UnauthorizedException('403', 'You do not have the required authorization.');
        }

        return $user;
    }

    public function update(UserResquest $request, User $user)
    {
        if (!Auth::user()->hasRole(['manager']))
        {
            throw new UnauthorizedException('403', 'You do not have the required authorization.');
        }

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
        if (!Auth::user()->hasRole(['manager']))
        {
            throw new UnauthorizedException('403', 'You do not have the required authorization.');
        }

        $user->delete();
        return response()->noContent();
    }
}
