<?php

declare(strict_types=1);

namespace App\Contracts;

interface RandomPhotoProvider
{
    public function getRandomPhotoUrl(string $query): string;
}
