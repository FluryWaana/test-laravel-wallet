<?php

declare(strict_types=1);

use App\DataTransferObjects\StoreRecuringTransferDto;

test('the function toArray return a complet array', function () {
    $startDate = now();
    $userId = 1;
    $recipientUserId = 2;

    $dto = new StoreRecuringTransferDto(
        userId: $userId,
        recipientUserId: $recipientUserId,
        amount: 10.00,
        frequency: 30,
        startDate: $startDate
    );

    $dtoArray = $dto->toArray();

    expect($dtoArray)->toBeArray();
    expect($dtoArray)->toHaveKeys(['user_id', 'recipient_user_id', 'amount', 'frequency', 'start_date']);
    expect($dtoArray['amount'])->toEqual(10.00);
    expect($dtoArray['frequency'])->toEqual(30);
    expect($dtoArray['start_date'])->toEqual($startDate);
    expect($dtoArray['user_id'])->toEqual($userId);
    expect($dtoArray['recipient_user_id'])->toEqual($recipientUserId);
});
