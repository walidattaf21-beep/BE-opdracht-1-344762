<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Maakt een account aan voor elke rol.
     */
    public function run(): void
    {
        $accounts = [
            ['name' => 'Admin Jamin',        'email' => 'admin@jamin.nl',      'rol' => 'admin'],
            ['name' => 'Magazijnmedewerker', 'email' => 'magazijn@jamin.nl',   'rol' => 'magazijnmedewerker'],
            ['name' => 'Gebruiker Jamin',    'email' => 'gebruiker@jamin.nl',  'rol' => 'gebruiker'],
        ];

        foreach ($accounts as $account) {
            User::updateOrCreate(
                ['email' => $account['email']],
                [
                    'name'              => $account['name'],
                    'rol'               => $account['rol'],
                    'password'          => Hash::make('jamin1234'),
                    'email_verified_at' => now(),
                ]
            );
        }
    }
}
