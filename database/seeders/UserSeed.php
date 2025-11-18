<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Alam kajoba',
            'identifiant' => 'KAJOBA007',
            'password' => Hash::make('password')
        ]);

        $adminRole = Role::firstOrCreate(['name' => 'Superadmin']);
        $adminRole->syncPermissions(Permission::all());
        $user->assignRole($adminRole);
    }
}
