<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    public function run()
    {
        // Create permissions
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'manage roles']);

        // Create roles and assign existing permissions
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo(Permission::all());

        $teacherRole = Role::create(['name' => 'teacher']);
        $teacherRole->givePermissionTo('view users');

        // Assign roles to users
        $admin = User::find(1); // Assuming user with ID 1 is admin
        $admin->assignRole('admin');

        $teacher = User::find(2); // Assuming user with ID 2 is teacher
        $teacher->assignRole('teacher');
    }
}
