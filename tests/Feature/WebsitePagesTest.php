<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Database\Seeders\DatabaseSeeder;

class WebsitePagesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test all primary public website routes return 200 OK
     */
    public function test_all_public_pages_load_successfully(): void
    {
        $this->seed(DatabaseSeeder::class);

        $urls = [
            '/',
            '/profil',
            '/pemerintahan',
            '/kehadiran',
            '/statistik',
            '/informasi',
            '/lapak',
            '/peta',
            '/e-surat',
            '/aspirasi',
            '/transparansi',
        ];

        foreach ($urls as $url) {
            $response = $this->get($url);
            $response->assertStatus(200);
        }
    }
}
