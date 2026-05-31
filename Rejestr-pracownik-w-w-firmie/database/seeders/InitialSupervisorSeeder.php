<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class InitialSupervisorSeeder extends Seeder
{
    /**
     * Seed the initial supervisor account.
     */
    public function run(): void
    {
        $email = env('INITIAL_SUPERVISOR_EMAIL', 'supervisor@ojf.local');

        User::updateOrCreate(
            ['email' => $email],
            [
                'name' => env('INITIAL_SUPERVISOR_NAME', 'Pierwszy przełożony'),
                'password' => Hash::make(env('INITIAL_SUPERVISOR_PASSWORD', 'Password123!')),
                'role' => 'supervisor',
                'supervisor_id' => null,
                'email_verified_at' => now(),
            ]
        );
    }
}
