<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RefreshRanking extends Command
{
    protected $signature = "ranking:refresh";

    protected $description = "Refreshes ranking";

    public function handle(): int
    {
        $this->call("ranking:draw", [
            "type" => "day",
        ]);
        $this->call("ranking:draw", [
            "type" => "week",
        ]);
        $this->call("ranking:draw", [
            "type" => "month",
        ]);
        $this->call("ranking:draw", [
            "type" => "year",
        ]);

        return Command::SUCCESS;
    }
}
