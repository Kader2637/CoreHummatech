<?php

namespace App\Providers;

use App\Models\Faq;
use App\Models\News;
use App\Models\Sale;
use App\Models\Testimonial;
use App\Models\SalesPackage;
use App\Observers\FaqObserver;
use App\Observers\NewsObserver;
use App\Observers\SaleObserver;
use App\Observers\TestimonialObserver;
use Illuminate\Auth\Events\Registered;
use App\Observers\SalesPackageObserver;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        News::observe(NewsObserver::class);
        Sale::observe(SaleObserver::class);
        SalesPackage::observe(SalesPackageObserver::class);
        Testimonial::observe(TestimonialObserver::class);
        Faq::observe(FaqObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
