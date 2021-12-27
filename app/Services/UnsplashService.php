<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\RandomPhotoProvider;
use Unsplash\HttpClient as UnsplashClient;
use Unsplash\Photo;

class UnsplashService implements RandomPhotoProvider
{
    public function __construct()
    {
        UnsplashClient::init([
            "applicationId" => config("unsplash.applicationId"),
            "secret" => config("unsplash.secret"),
            "callbackUrl" => config("unsplash.callbackUrl"),
            "utmSource" => config("unsplash.utmSource"),
        ]);
    }

    public function getRandomPhotoUrl(string $query): string
    {
        $photo = Photo::random([
            "query" => $query,
        ]);

        return $photo->download();
    }
}
