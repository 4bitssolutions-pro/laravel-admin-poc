<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    public function run()
    {
        $supadmin_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($supadmin_permissions->pluck('id'));
        $manager_permissions = $supadmin_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 5) == 'manag' ;
        });
        $admin_permissions =$supadmin_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 5) !== 'subad' ;
        });
        Role::findOrFail(2)->permissions()->sync($admin_permissions);
        Role::findOrFail(3)->permissions()->sync($manager_permissions);
    }
}
