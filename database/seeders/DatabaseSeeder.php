<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::updateOrCreate(
            ['email' => 'sport@qtghs.co.za'],
            [
                'name' => 'Elisma Hayes',
                'password' => bcrypt('GHS!50TH3L!m@'),
                'role' => 'admin',
            ]
        );

        // $this->call([
        //     RoleSeeder::class,
        // ]);

    }
}
