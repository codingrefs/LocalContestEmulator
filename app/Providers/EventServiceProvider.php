<?php

namespace App\Providers;

use App\Events\ContestUnitsUpdatedEvent;
use App\Events\ContestUpdatedEvent;
use App\Events\GameLogsUpdatedEvent;
use App\Events\UserBalanceUpdatedEvent;
use App\Events\UserTransactionCreatedEvent;
use App\Listeners\ContestUnitsUpdatedListener;
use App\Listeners\ContestUpdatedListener;
use App\Listeners\GameLogsUpdatedListener;
use App\Listeners\UserBalanceUpdatedListener;
use App\Listeners\UserTransactionCreatedListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        ContestUpdatedEvent::class => [
            ContestUpdatedListener::class,
        ],
        ContestUnitsUpdatedEvent::class => [
            ContestUnitsUpdatedListener::class,
        ],
        GameLogsUpdatedEvent::class => [
            GameLogsUpdatedListener::class,
        ],
        UserBalanceUpdatedEvent::class => [
            UserBalanceUpdatedListener::class,
        ],
        UserTransactionCreatedEvent::class => [
            UserTransactionCreatedListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot()
    {
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
