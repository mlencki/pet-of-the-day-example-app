<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RankingItemResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "type" => $this->type,
            "url" => $this->url,
        ];
    }
}
