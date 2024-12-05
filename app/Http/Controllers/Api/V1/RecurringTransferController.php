<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Actions\RecurringTransferIndex;
use App\Actions\RecurringTransferStore;
use App\DataTransferObjects\StoreRecuringTransferDto;
use App\Http\Resources\RecurringTransferResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class RecurringTransferController
{
    public function index(RecurringTransferIndex $recurringTransferIndex): AnonymousResourceCollection
    {
        $user = auth()->user();

        $recurringTransfers = $recurringTransferIndex->execute($user);

        return RecurringTransferResource::collection($recurringTransfers);
    }

    public function store(Request $request, RecurringTransferStore $recurringTransferStore): RecurringTransferResource
    {
        // TODO Validé les données dans un formRequest
        $user = auth()->user();

        $recipientCurrentId = User::firstOrFail($request->get('recipient_id'));

        $recurringTransfer = $recurringTransferStore->execute(new StoreRecuringTransferDto(
            userId: $user->getKey(),
            recipientUserId: $recipientCurrentId->getKey(),
            amount: $request->get('amount'),
            frequency: $request->get('frequency'),
            startDate: $request->get('start_date'),
        ));

        return new RecurringTransferResource($recurringTransfer);
    }
}
