<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Language;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Language::create([
            'id' => 1,
            'alpha2' => 'fr',
            'name' => 'French',
            'name_locale' => 'Français',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Language::create([
            'id' => 2,
            'alpha2' => 'en',
            'name' => 'English',
            'name_locale' => 'English',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Language::create([
            'id' => 3,
            'alpha2' => 'es',
            'name' => 'Spanish',
            'name_locale' => 'Español',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
       
    }
}
