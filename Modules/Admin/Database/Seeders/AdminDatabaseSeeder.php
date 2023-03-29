<?php

namespace Modules\Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Admin\Entities\Admin;

class AdminDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $admin = Admin::firstOrCreate([
            'name' => 'admin',
            'email' => 'admin@admin.com'],
            ['password' => bcrypt('admin')]
        );

        $admin->assignRole('admin');
        // $this->call("OthersTableSeeder");
    }
}
