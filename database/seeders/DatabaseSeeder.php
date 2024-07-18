<?php

namespace Database\Seeders;

use App\Models\Note;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Contact;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\ContactSeeder;
use Database\Seeders\CountrySeeder;
use Database\Seeders\RequestSeeder;
use Database\Seeders\HospitalSeeder;
use Database\Seeders\DepartmentSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            DepartmentSeeder::class,
            UserSeeder::class,
            CountrySeeder::class,
            HospitalSeeder::class,
            ContactSeeder::class,
            RequestSeeder::class,
            NoteSeeder::class
        ]);
    }
}
