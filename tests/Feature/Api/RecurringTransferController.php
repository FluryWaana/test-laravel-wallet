<?php

declare(strict_types=1);

use App\Http\Controllers\Api\V1\AccountController;
use App\Models\User;
use App\Models\Wallet;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\getJson;

test('get all recurring transfer', function () {
    $user = User::factory()
        ->has(Wallet::factory()->richChillGuy())
        ->create(['name' => 'John Doe', 'email' => 'test@test.com']);

    actingAs($user);

    getJson('/api/v1/recurring-transfers')->assertOk();
});


