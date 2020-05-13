<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Listeners\WelcomeNewCustomerListener;
use App\Listeners\NotifyAdminViaSlack;  
use App\Events\NewCustomerRegisteredEvent;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        NewCustomerRegisteredEvent::class => [
            //SendEmailVerificationNotification::class,
            //\App\Listeners\RegisterCustomerToNewsletter::class,
            \App\Listeners\WelcomeNewCustomerListener::class,
            \App\Listeners\NotifyAdminViaSlack::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
