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
            'name' => 'Alakm kajoba',
            'email' => 'test@example.com',
            'password' => Hash::make('password')
        ]);

        $adminRole = Role::firstOrCreate(['name' => 'Superadmin']);
        $adminRole->syncPermissions(Permission::all());
        $user->assignRole($adminRole);
    }
}
