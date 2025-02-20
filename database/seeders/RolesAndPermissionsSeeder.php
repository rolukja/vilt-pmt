<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            'edit projects',
            'delete projects',
            'create projects',
            'view projects',
            'edit tasks',
            'delete tasks',
            'create tasks',
            'view tasks',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $admin = Role::firstOrCreate(['name' => 'admin']);
        $editor = Role::firstOrCreate(['name' => 'editor']);
        $guest = Role::firstOrCreate(['name' => 'guest']);

        $admin->syncPermissions(Permission::all());

        $editor->syncPermissions(
            Permission::whereNotIn('name', ['delete projects', 'delete tasks'])->get()
        );

        $guest->syncPermissions(['view projects', 'view tasks']);


        $adminUser = User::find(1);
        if ($adminUser) {
            $adminUser->assignRole('admin')->save();
        }

    }
}