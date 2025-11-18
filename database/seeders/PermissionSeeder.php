<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'Rendez-vous' => [
                'peut créer un rendez-vous',
                'peut modifier un rendez-vous',
                'peut supprimer un rendez-vous',
                'peut voir un rendez-vous',
            ],

            'Consultation' => [
                'peut créer une consultation',
                'peut modifier une consultation',
                'peut supprimer une consultation',
                'peut voir une consultation annulée',
                'peut voir une consultation finie',
                'peut voir une classe',
            ],

            'Laboratoire' => [
                'peut créer un utilisateur',
                'peut modifier un utilisateur',
                'peut supprimer un utilisateur',
                'peut voir un utilisateur',
            ],

            'Abonée' => [
                'peut créer un abonée',
                'peut modifier un abonée',
                'peut supprimer un abonée',
                'peut voir un abonée',
            ],

            'Utilisateur' => [
                'peut créer un utilisateur',
                'peut modifier un utilisateur',
                'peut supprimer un utilisateur',
                'peut voir un utilisateur',
            ],

            'permission' => [
                'peut assigner permission',
            ],
        ];

        foreach ($permissions as $group => $perms) {
            foreach ($perms as $permission) {
                Permission::firstOrCreate([
                    'name' => $permission,
                    'group_name' => $group,
                ]);
            }
        }
    }
}
