<?php

namespace Database\Seeders;
use App\Models\Category;
use App\Models\Apparatus;
use App\Models\Section;
use App\Models\SchoolYear;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Category::factory(10)->create();
        Section::factory(3)->create();
        Apparatus::factory(3)->create();

        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(SchoolYearSeeder::class);
        $this->call(SystemsettingSeeder::class);
    }
}
