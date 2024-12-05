<?php

declare(strict_types=1);

namespace App\Actions;

use App\DataTransferObjects\StoreRecuringTransferDto;
use App\Models\RecurringTransfer;

readonly class RecurringTransferStore
{
    /**
     * @param StoreRecuringTransferDto $dto
     * @return RecurringTransfer
     */
    public function execute(StoreRecuringTransferDto $dto): RecurringTransfer
    {
        return RecurringTransfer::create($dto->toArray());
    }
}
