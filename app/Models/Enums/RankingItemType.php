<?php

declare(strict_types=1);

namespace App\Models\Enums;

enum RankingItemType
{
    case DAY;
    case WEEK;
    case MONTH;
    case YEAR;

    public function label(): string
    {
        return match ($this) {
            RankingItemType::DAY => "day",
            RankingItemType::WEEK => "week",
            RankingItemType::MONTH => "month",
            RankingItemType::YEAR => "year",
        };
    }

    public static function availableLabels(): array
    {
        return array_map(
            fn(RankingItemType $status) => $status->label(),
            RankingItemType::cases(),
        );
    }
}
