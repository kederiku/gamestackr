<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Country::create([
            'id' => 1,
            'alpha2' => 'FR',
            'name' => 'France',
            'name_locale' => 'France',
            'flag' => 'countries/flag/FR.svg',
            'region' => 'EUROPE',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Country::create([
            'id' => 2,
            'alpha2' => 'ES',
            'name' => 'Spain',
            'name_locale' => 'España',
            'flag' => 'countries/flag/ES.svg',
            'region' => 'EUROPE',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Country::create([
            'id' => 3,
            'alpha2' => 'GB',
            'name' => 'United Kingdom',
            'name_locale' => 'United Kingdom',
            'flag' => 'countries/flag/GB.svg',
            'region' => 'EUROPE',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Country::create([
            'id' => 4,
            'alpha2' => 'US',
            'name' => 'United States',
            'name_locale' => 'United States',
            'flag' => 'countries/flag/US.svg',
            'region' => 'AMERICA',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
       
    }
}
