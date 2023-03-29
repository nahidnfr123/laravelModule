<?php

namespace Modules\Access\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call("OthersTableSeeder");

        app()['cache']->forget('spatie.permission.cache');

        $path = base_path() . "/permissions.json";
        $permissionGroups = json_decode(file_get_contents($path), true);

        $roles = [
            [
                'name' => 'admin',
                'guard_name' => 'admin',
            ],
            [
                'name' => 'affiliate',
                'guard_name' => 'affiliate',
            ],
            [
                'name' => 'user',
                'guard_name' => 'web',
            ],
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate($role);
        }

        $permissions = [
            [
                'name' => 'view-affiliate-user',
                'guard_name' => 'admin',
                'main_menu' => 'affiliate-user',
                'sub_menu' => 'view-user',
            ],
            [
                'name' => 'create-affiliate-user',
                'guard_name' => 'admin',
                'main_menu' => 'affiliate-user',
                'sub_menu' => 'create-user',

            ],
            [
                'name' => 'edit-affiliate-user',
                'guard_name' => 'admin',
                'main_menu' => 'affiliate-user',
                'sub_menu' => 'edit-user',
            ],
            [
                'name' => 'delete-affiliate-user',
                'guard_name' => 'admin',
                'main_menu' => 'affiliate-user',
                'sub_menu' => 'delete-user',
            ],
            [
                'name' => 'view-transaction',
                'guard_name' => 'admin',
                'main_menu' => 'transaction',
                'sub_menu' => 'view-transaction',
            ],
            [
                'name' => 'create-transaction',
                'guard_name' => 'admin',
                'main_menu' => 'transaction',
                'sub_menu' => 'create-transaction',
            ],
            [
                'name' => 'edit-transaction',
                'guard_name' => 'admin',
                'main_menu' => 'transaction',
                'sub_menu' => 'edit-transaction',
            ],
            [
                'name' => 'delete-transaction',
                'guard_name' => 'admin',
                'main_menu' => 'transaction',
                'sub_menu' => 'delete-transaction',
            ],
        ];

        foreach ($permissions as $key => $permission) {
            Permission::updateOrCreate([
                'name' => $permission['name'],
                'guard_name' => $permission['guard_name'],
            ], [
                'main_menu' => $permission['main_menu'],
                'sub_menu' => $permission['sub_menu'],
            ]);
        }

        Role::where('name', 'admin')->first()->syncPermissions(Permission::all());
    }
}
