<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Locale;

class LocaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Locale::create([
            'id' => 1,
            'name' =>'fr_FR',
            'language_id' => 1,
            'country_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Locale::create([
            'id' => 2,
            'name' =>'es_ES',
            'language_id' => 3,
            'country_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Locale::create([
            'id' => 3,
            'name' =>'en_GB',
            'language_id' => 2,
            'country_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Locale::create([
            'id' => 4,
            'name' =>'en_US',
            'language_id' => 2,
            'country_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Locale::create([
            'id' => 5,
            'name' =>'ja_JP',
            'language_id' => 4,
            'country_id' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
       
    }
}
