<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_permissions')->insert([
            [
                'permissions'   => 'Index',
                'role_id'       => 1
            ], [
                'permissions'   => 'Create',
                'role_id'       => 1
            ], [
                'permissions'   => 'Update',
                'role_id'       => 1
            ], [
                'permissions'   => 'Delete',
                'role_id'       => 1
            ], [
                'permissions'   => 'View',
                'role_id'       => 1
            ]
        ]);
    }
}
