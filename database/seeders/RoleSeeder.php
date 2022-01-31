<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        $roles = [
            'Administrador',
            'Jefe OGAD',
            'Almacenero'
        ];

        foreach ($roles as $role) {
            Role::create([
                'name' => $role
            ]);
        }
    }
}
