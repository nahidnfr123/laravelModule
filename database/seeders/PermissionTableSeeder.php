<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()['cache']->forget('spatie.permission.cache');

        $path = base_path() . "/permissions.json";
        $permissionGroups = json_decode(file_get_contents($path), true);

        $roles = ['admin', 'affiliate', 'user'];

        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        foreach ($permissionGroups as $key => $permissionGroup) {
            foreach ($permissionGroup as $permission) {
                Permission::updateOrCreate([
                    'name' => gettype($permission) == 'string' ? $permission : $permission[0],
                    'guard_name' => $key
                ], [
                    'name' => gettype($permission) == 'string' ? $permission : $permission[0],
//                    'type' => $key,
                    'guard_name' => $key,
//                    'special' => gettype($permission) == 'array' ? $permission[1] : 0
                ]);
            }
        }

        Role::where('name', 'admin')->first()->syncPermissions(Permission::all());
    }
}
