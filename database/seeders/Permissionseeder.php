<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Permissionseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $permissions = [
            'view pages',
            'edit pages',
            'create pages',
            'delete pages',
            'view users',
            'create users',
            'edit users',
            'delete users',
            'manage roles',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $admin = Role::firstOrCreate(['name' => 'Admin']);
        $admin->givePermissionTo(Permission::all());

        $editor = Role::firstOrCreate(['name' => 'Editor']);
        $editor->givePermissionTo(['view pages', 'edit pages']);

        $viewer = Role::firstOrCreate(['name' => 'Viewer']);
        $viewer->givePermissionTo(['view pages']);
    }
}
