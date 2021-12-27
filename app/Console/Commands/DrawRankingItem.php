<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Contracts\RandomPhotoProvider;
use App\Models\Enums\RankingItemType;
use App\Models\RankingItem;
use Illuminate\Console\Command;

class DrawRankingItem extends Command
{
    protected $signature = "ranking:draw {type}";

    protected $description = "Draws random ranking item";

    public function handle(RandomPhotoProvider $photoProvider): int
    {
        $type = $this->argument("type");

        if (!in_array($type, RankingItemType::availableLabels(), true)) {
            $this->error("Selected draw type is not supported.");
            return Command::FAILURE;
        }

        $rankingItem = new RankingItem();
        $rankingItem->type = $type;
        $rankingItem->url = $photoProvider->getRandomPhotoUrl("cat");
        $rankingItem->save();

        return Command::SUCCESS;
    }
}
