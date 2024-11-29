<?php

namespace Database\Seeders;

use App\Models\Rule;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a test user
        User::factory()->testUser()->create();
        User::factory()->adminUser()->create();
        User::factory()->dentistUser()->create(); // Remove this line
        User::factory()->employeeUser()->create();
        User::factory()->patientUser()->create();
        Rule::factory()->dentist()->create();
        Rule::factory()->employee()->create();
        // Rule::factory()->patient()->create(); // Remove this line
        // Rule::factory()->user()->create(); // Remove this line
        Rule::factory()->create();

        // Other seeders can be called here
        // $this->call(OtherSeeder::class);
    }
}
