<?php

use App\Http\Controllers\Api\Contests\GameLogs;
use App\Http\Controllers\Api\Contests\History;
use App\Http\Controllers\Api\Contests\Live;
use App\Http\Controllers\Api\Contests\Lobby;
use App\Http\Controllers\Api\Contests\Players;
use App\Http\Controllers\Api\Contests\Show as ContestShow;
use App\Http\Controllers\Api\Contests\Types;
use App\Http\Controllers\Api\Contests\Upcoming;
use App\Http\Controllers\Api\Transactions\DailyBonus;
use App\Http\Controllers\Api\Transactions\Transactions;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::prefix('contests')->group(function () {
        Route::get('{id}', ContestShow::class)->where('id', '[0-9]+');
        Route::get('types', Types::class);
        Route::get('lobby', Lobby::class)->middleware('pagination.camelCase');
        Route::middleware('auth:api')->group(function (): void {
            Route::get('upcoming', Upcoming::class)->middleware('pagination.camelCase');
            Route::get('live', Live::class)->middleware('pagination.camelCase');
            Route::get('history', History::class)->middleware('pagination.camelCase');
            Route::get('{id}/players', Players::class)->where('id', '[0-9]+');
            Route::get('{id}/game-logs', GameLogs::class)->where('id', '[0-9]+')->middleware('pagination.camelCase');
        });
    });

    Route::prefix('transactions')->middleware('auth:api')->group(function (): void {
        Route::get('', Transactions::class)->middleware('pagination.camelCase');
        Route::middleware('throttle:6,1')->get('daily-bonus', DailyBonus::class);
    });
});
