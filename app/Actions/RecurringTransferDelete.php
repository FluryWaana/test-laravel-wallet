<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\RecurringTransfer;
use App\Models\User;
use Gate;

readonly class RecurringTransferDelete
{
    /**
     * @param User $user
     * @param RecurringTransfer $recurringTransfer
     * @return bool
     */
    public function execute(User $user, RecurringTransfer $recurringTransfer): bool
    {
        Gate::authorize('update', [$user, $recurringTransfer]);

        return RecurringTransfer::update([
            'end_at' => now(),
        ]);
    }
}
