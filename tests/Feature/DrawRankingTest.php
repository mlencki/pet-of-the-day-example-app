<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Contracts\RandomPhotoProvider;
use App\Tests\Mocks\UnsplashService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DrawRankingTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->app->bind(RandomPhotoProvider::class, fn() => new UnsplashService());
    }

    public function testItDrawsRandomPhotoAndStoresItInTheDb(): void
    {
        $this->assertDatabaseCount("ranking_items", 0);

        $this->artisan("ranking:draw", [
            "type" => "day",
        ]);

        $this->assertDatabaseHas(
            "ranking_items",
            [
                "type" => "day",
            ],
        );
    }
}
