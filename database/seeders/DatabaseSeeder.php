<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

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

        Team::insert([
        [
            'name' => 'Dallas Mavericks',
            'city' => 'Dallas',
            'abbreviation' => 'DAL',
            'logo' => 'images/teams/mavericks.png',
            'conference' => 'Western',
            'division' => 'Southwest',
            'wins' => 10,
            'losses' => 10,
            'arena' => 'American Airlines Center',
        ],
        [
            'name' => 'Los Angeles Lakers',
            'city' => 'Los Angeles',
            'abbreviation' => 'LAL',
            'logo' => 'teams/lakers.png',
            'conference' => 'Western',
            'division' => 'Pacific',
            'wins' => 47,
            'losses' => 35,
            'arena' => 'Crypto.com Arena',
        ],
        ]);
    }
}
