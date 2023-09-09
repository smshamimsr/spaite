<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create(['name' => 'writer']);
        $permission = [
            ['name' => 'post list'],
            ['name' => 'post edit'],
            ['name' => 'post show'],
            ['name' => 'post delete'],
            ['name' => 'role list'],
            ['name' => 'role edit'],
            ['name' => 'role show'],
            ['name' => 'role delete'],
        ];


        foreach ($permission as $item) {
            Permission::create($item);
        }
        $role->syncPermissions(Permission::all());

        $user = User::first();
        $user->assignRole($role);
    }
}
