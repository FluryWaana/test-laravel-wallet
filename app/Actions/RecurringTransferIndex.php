<?php

namespace App\Actions;

use App\Models\RecurringTransfer;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

readonly class RecurringTransferIndex
{
    /**
     * @param User $user
     * @return Collection
     */
    public function execute(User $user): Collection
    {
        return RecurringTransfer::where('user_id', $user->id)->get();
    }

}
