<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class TestData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name'=>'user']);
        $role2 = Role::create(['name'=>'admin']);
        $role3 = Role::create(['name'=>'super admin']);
        $permission_role_edit = Permission::create(['name'=>'sua tieu chi']);
        $permission_role_view = Permission::create(['name'=>'xem tieu chi']);
        $permission_role_view->assignRole($role1);

        $units = [[
            'name' => 'Toán',
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ], [
            'name' => 'CNTT',
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ]];

        DB::table('unit')->insert($units); // Query Builder approach

    }
}
