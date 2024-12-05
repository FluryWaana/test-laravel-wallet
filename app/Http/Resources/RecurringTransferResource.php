<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\RecurringTransfer
 */
class RecurringTransferResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->getKey(),
            'amount' => $this->amount,
            'start_at' => $this->start_at,
            'end_at' => $this->end_at,
            'frequency' => $this->frequency,
            'recipient' => new UserResource($this->recipient),
        ];
    }
}
