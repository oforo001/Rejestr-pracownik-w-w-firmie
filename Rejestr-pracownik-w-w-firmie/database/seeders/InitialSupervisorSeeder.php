<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class InitialSupervisorSeeder extends Seeder
{
    /**
     * Seed the initial admin account.
     */
    public function run(): void
    {
        $email = env('INITIAL_ADMIN_EMAIL', env('INITIAL_SUPERVISOR_EMAIL', 'admin@ojf.local'));
        $name = env('INITIAL_ADMIN_NAME', env('INITIAL_SUPERVISOR_NAME', 'Pierwszy administrator'));
        $password = env('INITIAL_ADMIN_PASSWORD', env('INITIAL_SUPERVISOR_PASSWORD', 'Password123!'));

        User::updateOrCreate(
            ['email' => $email],
            [
                'name' => $name,
                'password' => Hash::make($password),
                'role' => 'admin',
                'is_active' => true,
                'supervisor_id' => null,
                'email_verified_at' => now(),
            ]
        );
    }
}
