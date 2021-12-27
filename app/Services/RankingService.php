<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Enums\RankingItemType;
use App\Models\RankingItem;
use Illuminate\Support\Collection;

class RankingService
{
    public function getLatestRanking(): Collection
    {
        $items = new Collection();

        foreach (RankingItemType::availableLabels() as $label) {
            $item = RankingItem::query()->where("type", $label)->latest()->first();

            if ($item) {
                $items->add($item);
            }
        }

        return $items;
    }
}
