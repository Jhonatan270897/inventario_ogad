<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Administrador',
            'email' => 'admin@admin',
            'username' => '12345678',
            'password' => bcrypt('12345678'),
        ]);

        $user->assignRole('Administrador');
    }
}
