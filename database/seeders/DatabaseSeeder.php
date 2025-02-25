<?php

namespace Database\Seeders;

use App\Models\Alumni;
use App\Models\Events;
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

        // Seed events data
        $this->seedEvents();

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

    /**
     * Seed events data
     */
    private function seedEvents(): void
    {
        $events = [
            [
                'id' => 1,
                'created_at' => '2025-02-24 08:20:03',
                'updated_at' => '2025-02-24 08:20:03',
                'event_name' => 'Golf Day',
                'event_description' => 'Golf Day',
                'event_date' => '2025-03-08T12:19',
                'event_location' => 'Golf club',
                'event_image' => 'events/KEMqYhlDzISdQ7I0xgTahPipnJPmyyY8R40iTIX7.jpg',
            ],
            [
                'id' => 2,
                'created_at' => '2025-02-25 05:53:57',
                'updated_at' => '2025-02-25 05:53:57',
                'event_name' => 'Blessing Service for 2025',
                'event_description' => 'Blessing Service for 2025',
                'event_date' => '2025-01-17T09:52',
                'event_location' => 'School Hall',
                'event_image' => 'events/4x1CMfNJJ61vVUFyKkvcV8Z7baBTFu8FWS1dYRJO.webp',
            ],
            [
                'id' => 3,
                'created_at' => '2025-02-25 05:55:44',
                'updated_at' => '2025-02-25 05:57:13',
                'event_name' => 'Fun Run',
                'event_description' => null,
                'event_date' => '2025-01-17T09:55',
                'event_location' => 'School',
                'event_image' => 'events/XCECtj5fQTonCUWBER2OlKhrLRPCzv7wIvW5tewj.webp',
            ],
            [
                'id' => 4,
                'created_at' => '2025-02-25 05:58:00',
                'updated_at' => '2025-02-25 05:58:00',
                'event_name' => 'Valentine\'s Cultural Week',
                'event_description' => null,
                'event_date' => '2025-02-10T09:57',
                'event_location' => 'School',
                'event_image' => 'events/udIBNtQkWVuzHNTdRSeYUhKKvVYZ8BsiJh1qnDXP.png',
            ],
            [
                'id' => 5,
                'created_at' => '2025-02-25 05:58:50',
                'updated_at' => '2025-02-25 05:58:50',
                'event_name' => 'Music Garden Festival',
                'event_description' => null,
                'event_date' => '2025-02-15T09:58',
                'event_location' => 'School',
                'event_image' => 'events/lh4rS85yybrhl4ZxdAAmxH5NW1crr2WafEdzsO3j.webp',
            ],
            [
                'id' => 7,
                'created_at' => '2025-02-25 06:01:26',
                'updated_at' => '2025-02-25 06:01:26',
                'event_name' => 'Hockey Tournament',
                'event_description' => null,
                'event_date' => '2025-03-14T09:59',
                'event_location' => 'Queens Recreational Center',
                'event_image' => 'events/n8deOXhuXEBbuVuOuKzpfyKVZoZzpINbgcOezG9U.jpg',
            ],
            [
                'id' => 8,
                'created_at' => '2025-02-25 06:02:06',
                'updated_at' => '2025-02-25 06:02:06',
                'event_name' => 'Black-Tie Ball',
                'event_description' => null,
                'event_date' => '2025-02-28T10:01',
                'event_location' => null,
                'event_image' => null,
            ],
            [
                'id' => 9,
                'created_at' => '2025-02-25 06:02:48',
                'updated_at' => '2025-02-25 06:02:48',
                'event_name' => 'Art Master Class',
                'event_description' => null,
                'event_date' => '2025-04-11T10:02',
                'event_location' => null,
                'event_image' => 'events/ltntHzXAExxc6PoXJ861mqjL1kt3eRwQa2ozCJQW.jpg',
            ],
            [
                'id' => 10,
                'created_at' => '2025-02-25 06:03:31',
                'updated_at' => '2025-02-25 06:03:31',
                'event_name' => 'Street Food Festival',
                'event_description' => null,
                'event_date' => '2025-04-26T10:03',
                'event_location' => null,
                'event_image' => null,
            ],
            [
                'id' => 11,
                'created_at' => '2025-02-25 06:04:17',
                'updated_at' => '2025-02-25 06:04:17',
                'event_name' => 'Culinary Master Class',
                'event_description' => null,
                'event_date' => '2025-05-09T10:03',
                'event_location' => 'School',
                'event_image' => 'events/i92YkN8VPshSDOyJKJwKb9TVcNxhJBwCvO5sVlWx.jpg',
            ],
            [
                'id' => 12,
                'created_at' => '2025-02-25 06:04:55',
                'updated_at' => '2025-02-25 06:17:20',
                'event_name' => 'Blind Beer Tasting',
                'event_description' => null,
                'event_date' => '2025-06-26T10:04',
                'event_location' => 'School',
                'event_image' => 'events/6JwKLuVjWotUqNFe4Ec8XBkOHarShbyNR1TVlcNb.webp',
            ],
            [
                'id' => 13,
                'created_at' => '2025-02-25 06:05:41',
                'updated_at' => '2025-02-25 06:05:41',
                'event_name' => '150th Birthday Carnival',
                'event_description' => null,
                'event_date' => '2025-07-24T10:05',
                'event_location' => null,
                'event_image' => 'events/ZsnIfjs3IAICLrPM9aeHQyfz0Y2DFzUMuE2IrWR9.jpg',
            ],
            [
                'id' => 14,
                'created_at' => '2025-02-25 06:06:07',
                'updated_at' => '2025-02-25 06:06:07',
                'event_name' => 'Grease Production',
                'event_description' => null,
                'event_date' => '2025-07-28T10:05',
                'event_location' => 'School',
                'event_image' => null,
            ],
            [
                'id' => 15,
                'created_at' => '2025-02-25 06:08:12',
                'updated_at' => '2025-02-25 06:08:12',
                'event_name' => '150 Fundraiser Run/Walk',
                'event_description' => 'Monday 28th of August',
                'event_date' => '2025-07-28T10:07',
                'event_location' => 'School',
                'event_image' => null,
            ],
            [
                'id' => 16,
                'created_at' => '2025-02-25 06:09:17',
                'updated_at' => '2025-02-25 06:09:17',
                'event_name' => '150 Fundraiser Run/Walk',
                'event_description' => 'Friday 8th of August',
                'event_date' => '2025-08-08T10:08',
                'event_location' => null,
                'event_image' => 'events/EnmHN8ZYc3AYg2ZqIkkDKh4wHTwjbRMxzHdl4ZiH.jpg',
            ],
            [
                'id' => 17,
                'created_at' => '2025-02-25 06:10:14',
                'updated_at' => '2025-02-25 06:10:14',
                'event_name' => 'Old Girls\' Banquet',
                'event_description' => null,
                'event_date' => '2025-08-31T10:09',
                'event_location' => null,
                'event_image' => 'events/ymksNtHckyr3n417KAbhJWiJr1y9GlDWRfO3WftJ.jpg',
            ],
        ];

        foreach ($events as $eventData) {
            Events::updateOrCreate(['id' => $eventData['id']], $eventData);
        }
    }
}
