<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PagesTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     */
    public function test_home_page_returns_a_successful_response_all_version(): void
    {
        $locales = config('localized-routes.supported_locales');
        $mainLocale = config('localized-routes.omitted_locale');
        foreach ($locales as $locale) {
            if($locale == $mainLocale) {
               $locale = '';
            }
            $response = $this->get('/'.$locale);
            $response->assertStatus(200);
        }

        $response = $this->get('/zz_ZZ');
        $response->assertStatus(404);
    }
}
