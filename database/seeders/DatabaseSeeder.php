<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Team;
use App\Models\Seat;
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

         User::factory()->create([
             'name' => 'Admin User',
             'email' => 'admin@example.com',
	        'is_admin' => true,
	        'password' => '12345678910',
         ]);

        // insert team info
        Team::insert([
        [
            'name' => 'Dallas Mavericks',
            'city' => 'Dallas',
            'abbreviation' => 'DAL',
            'logo' => 'images/teams/Dallas_Mavericks_logo.svg',
            'conference' => 'Western',
            'division' => 'Southwest',
            'wins' => 2,
            'losses' => 2,
            'arena' => 'American Airlines Center',
        ],
        [
            'name' => 'Los Angeles Lakers',
            'city' => 'Los Angeles',
            'abbreviation' => 'LAL',
            'logo' => 'images/teams/Los_Angeles_Lakers_logo.svg',
            'conference' => 'Western',
            'division' => 'Pacific',
            'wins' => 4,
            'losses' => 2,
            'arena' => 'Crypto.com Arena',
        ],
        [
            'name' => 'New York Knicks',
            'city' => 'New York',
            'abbreviation' => 'NYK',
            'logo' => 'images/teams/NYK_logo.svg',
            'conference' => 'Eastern',
            'division' => 'Atlantic',
            'wins' => 7,
            'losses' => 0,
            'arena' => 'Madison Square Garden',
        ],
        [
            'name' => 'Oklahoma City Thunder',
            'city' => 'Oklahoma City',
            'abbreviation' => 'OKC',
            'logo' => 'images/teams/Oklahoma_City_Thunder.svg',
            'conference' => 'Western',
            'division' => 'Northwest',
            'wins' => 5,
            'losses' => 2,
            'arena' => 'Paycom Center',
        ],
        [
            'name' => 'San Antonio Spurs',
            'city' => 'San Antonio',
            'abbreviation' => 'SAS',
            'logo' => 'images/teams/San_Antonio_Spurs.svg',
            'conference' => 'Western',
            'division' => 'Southwest',
            'wins' => 7,
            'losses' => 0,
            'arena' => 'Frost Bank Center',
        ],
        ]);

    }
}
