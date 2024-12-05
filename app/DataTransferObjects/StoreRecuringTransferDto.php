<?php

declare(strict_types=1);

namespace App\DataTransferObjects;

use Illuminate\Contracts\Support\Arrayable;
use PhpParser\Node\Expr\Cast\Double;

readonly class StoreRecuringTransferDto implements Arrayable
{
    public function __construct(
        public int $userId,
        public int $recipientUserId,
        public float $amount,
        public int $frequency,
        public \DateTime $startDate,
    ) {}

    public function toArray(): array
    {
        return [
            'user_id' => $this->userId,
            'recipient_user_id' => $this->recipientUserId,
            'amount' => $this->amount,
            'frequency' => $this->frequency,
            'start_date' => $this->startDate,
        ];
    }
}
