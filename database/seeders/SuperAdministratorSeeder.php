<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Get the superadministrator role (created by LaratrustSeeder)
        $superAdminRole = Role::where('name', 'superadministrator')->first();

        // Create the superadministrator user
        $superAdmin = User::firstOrCreate(
            [
                'email' => 'superadmin@citypotato.com',
            ],
            [
                'name' => 'Super Administrator',
                'password' => Hash::make('password'),
            ]
        );

        // Assign the superadministrator role to the user
        if (!$superAdmin->hasRole('superadministrator')) {
            $superAdmin->addRole($superAdminRole);
        }

        $this->command->info('Super Administrator user created successfully.');
        $this->command->info('Email: superadmin@example.com');
        $this->command->info('Password: password');
    }
}
