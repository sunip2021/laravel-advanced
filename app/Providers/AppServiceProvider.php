<?php

namespace App\Providers;

use App\Events\PostCreated;
use App\Listeners\NotifyUser;
use App\Models\Post;
use App\Observers\PostObserver;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
         Schema::defaultStringLength(191);
         Event::listen(
            PostCreated::class,NotifyUser::class
         );
         Post::observe(PostObserver::class);
    }
}
