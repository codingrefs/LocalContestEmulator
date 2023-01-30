<?php

namespace App\Http\Resources\Contests;

use App\Http\Resources\ContestUsers\ContestUserResource;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     title="PrizePlaceResource",
 *     @OA\Property(property="places", type="integer", example="1"),
 *     @OA\Property(property="prize", type="number", format="double", example="120.75"),
 *     @OA\Property(property="voucher", type="number", format="double", nullable=true),
 *     @OA\Property(property="badgeId", type="integer", nullable=true),
 *     @OA\Property(property="numBadges", type="integer", nullable=true),
 *     @OA\Property(property="winners", type="array", @OA\Items(ref="#/components/schemas/ContestUserResource")),
 *     @OA\Property(property="from", type="integer"),
 *     @OA\Property(property="to", type="integer")
 * )
 */
class PrizePlaceResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'places' => $this->places,
            'prize' => $this->prize,
            'voucher' => $this->voucher,
            'badgeId' => $this->badgeId,
            'numBadges' => $this->numBadges,
            'winners' => ContestUserResource::collection($this->winners),
            'from' => $this->from,
            'to' => $this->to,
        ];
    }
}
