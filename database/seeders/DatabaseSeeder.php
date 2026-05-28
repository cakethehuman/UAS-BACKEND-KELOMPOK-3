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
            'logo' => 'images/teams/Dallas_Mavericks_logo.svg',
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
            'logo' => 'images/teams/Los_Angeles_Lakers_logo.svg',
            'conference' => 'Western',
            'division' => 'Pacific',
            'wins' => 12,
            'losses' => 12,
            'arena' => 'Crypto.com Arena',
        ],
        [
            'name' => 'New York Knicks',
            'city' => 'New York',
            'abbreviation' => 'NYK',
            'logo' => 'images/teams/NYK_logo.svg',
            'conference' => 'Eastern',
            'division' => 'Atlantic',
            'wins' => 10,
            'losses' => 10,
            'arena' => 'Madison Square Garden',
        ],
        [
            'name' => 'Oklahoma City Thunder',
            'city' => 'Oklahoma City',
            'abbreviation' => 'OKC',
            'logo' => 'images/teams/Oklahoma_City_Thunder.svg',
            'conference' => 'Western',
            'division' => 'Northwest',
            'wins' => 10,
            'losses' => 10,
            'arena' => 'Paycom Center',
        ],
        [
            'name' => 'San Antonio Spurs',
            'city' => 'San Antonio',
            'abbreviation' => 'SAS',
            'logo' => 'images/teams/San_Antonio_Spurs.svg',
            'conference' => 'Western',
            'division' => 'Southwest',
            'wins' => 10,
            'losses' => 10,
            'arena' => 'Frost Bank Center',
        ],
        ]);
    }
}
