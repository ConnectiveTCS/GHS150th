<?php

namespace Database\Seeders;

use App\Models\Alumni;
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

        // Create admin user
        User::updateOrCreate(
            ['email' => 'sport@qtghs.co.za'],
            [
                'name' => 'Elisma Hayes',
                'password' => bcrypt('GHS!50TH3L!m@'),
                'role' => 'admin',
            ]
        );

        // Create test users and associate alumni records
        $this->createUserAndAlumni(
            'test1@test.com',
            'Test One',
            [
                'first_name' => 'Test',
                'last_name' => 'One',
                'phone' => '1234567890',
                'class_of' => '2021',
                'id_number' => '1234567890123',
                'current_employer' => 'Test Company',
                'current_position' => 'Tester',
                'current_location' => 'Testville',
                'bio' => 'This is a test user.',
                'profile_picture' => '',
            ]
        );

        $this->createUserAndAlumni(
            'test2@test.com',
            'Test Two',
            [
                'first_name' => 'Test',
                'last_name' => 'Two',
                'phone' => '2345678901',
                'class_of' => '2019',
                'id_number' => '2345678901234',
                'current_employer' => 'ABC Corporation',
                'current_position' => 'Developer',
                'current_location' => 'Cape Town',
                'bio' => 'Software developer with 3 years experience.',
                'profile_picture' => '',
            ]
        );

        $this->createUserAndAlumni(
            'test3@test.com',
            'Test Three',
            [
                'first_name' => 'Test',
                'last_name' => 'Three',
                'phone' => '3456789012',
                'class_of' => '2015',
                'id_number' => '3456789012345',
                'current_employer' => 'Global Solutions',
                'current_position' => 'Project Manager',
                'current_location' => 'Johannesburg',
                'bio' => 'Experienced project manager leading tech initiatives.',
                'profile_picture' => '',
            ]
        );

        

        // $this->call([
        //     RoleSeeder::class,
        // ]);
    }

    /**
     * Helper method to create a user and associated alumni record
     */
    private function createUserAndAlumni(string $email, string $name, array $alumniData): void
    {
        // Create user
        $user = User::updateOrCreate(
            ['email' => $email],
            [
                'name' => $name,
                'password' => bcrypt('password'),
                'role' => 'alumni',
            ]
        );

        // Create alumni profile with user_id link
        $alumniData['email'] = $email;
        $alumniData['user_id'] = $user->id;

        Alumni::updateOrCreate(
            ['email' => $email],
            $alumniData
        );
    }
}
