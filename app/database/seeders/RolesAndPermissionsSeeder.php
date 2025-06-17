<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create admin permissions using firstOrCreate
        Permission::firstOrCreate(['name' => 'manage-users']);
        Permission::firstOrCreate(['name' => 'delete-users']);
        Permission::firstOrCreate(['name' => 'view-user-reports']);
        Permission::firstOrCreate(['name' => 'view-admin-dashboard']);
        Permission::firstOrCreate(['name' => 'launch-phishing-simulation']); // Better naming
        Permission::firstOrCreate(['name' => 'view-simulation-results']); // Made plural for consistency

        // Create user permissions using firstOrCreate
        $userPermissions = [
            'view-user-dashboard',
            'take-phishing-tests', 
            'view-own-results',
            'update-profile',
            'change-password'
        ];

        foreach($userPermissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles using firstOrCreate
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // Assign permissions to roles using syncPermissions (safe to run multiple times)
        $adminRole->syncPermissions(Permission::all());
        $userRole->syncPermissions($userPermissions);

        // Create admin user using firstOrCreate
        $adminUser = \App\Models\User::firstOrCreate(
            ['email' => 'admin@phishy.com'], // Search criteria
            [
                'name' => 'Admin User',
                'password' => \Illuminate\Support\Facades\Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );
        
        // Ensure admin user has admin role (safe to run multiple times)
        if (!$adminUser->hasRole('admin')) {
            $adminUser->assignRole('admin');
        }
    }
}
