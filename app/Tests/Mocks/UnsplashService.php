<?php

declare(strict_types=1);

namespace App\Tests\Mocks;

use App\Contracts\RandomPhotoProvider;

class UnsplashService implements RandomPhotoProvider
{
    public function getRandomPhotoUrl(string $query): string
    {
        return "https://example.org/photo.jpg";
    }
}
