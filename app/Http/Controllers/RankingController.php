<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\RankingService;

class RankingController extends Controller
{
    public function __construct(
        protected RankingService $rankingService,
    ) {
    }

    public function index()
    {
        return view("ranking", [
            "ranking" => $this->rankingService->getLatestRanking(),
        ]);
    }
}
