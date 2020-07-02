<?php

use Illuminate\Database\Seeder;
use \Spatie\Permission\Models\Role;
use \BitzenTecnologia\User;
use Spatie\Permission\Models\Permission;

class AccessControlListSeeder extends Seeder
{

    public function run()
    {
        $adminPermission = new Permission();
        $adminPermission->name = 'admin_permission';
        $adminPermission->guard_name = 'api';
        $adminPermission->save();

        $employePermission = new Permission();
        $employePermission->name = 'employe_permission';
        $employePermission->guard_name = 'api';
        $employePermission->save();

        $userPermission = new Permission();
        $userPermission->name = 'user_permission';
        $userPermission->guard_name = 'api';
        $userPermission->save();

        $managerRoles = new Role();
        $managerRoles->name = 'manager';
        $managerRoles->guard_name = 'api';
        $managerPermissions = [
            $adminPermission->name,
            $employePermission->name,
            $userPermission->name
        ];
        $managerRoles->syncPermissions($managerPermissions);
        $managerRoles->save();

        $manager = User::where('id', 1)->first();
        $manager->syncRoles($managerRoles);

        $employeRoles = new Role();
        $employeRoles->name = 'employe';
        $employeRoles->guard_name = 'api';
        $employePermissions = [
            $employePermission->name,
            $userPermission->name
        ];
        $employeRoles->syncPermissions($employePermissions);
        $employeRoles->save();

        $employe = User::where('id', 2)->first();
        $employe->syncRoles($employeRoles);

    }
}
