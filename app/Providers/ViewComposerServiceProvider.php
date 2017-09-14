<?php

namespace Pitaj\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Pitaj\Models\Tag;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the ViewComposer services.
     *
     * @return void
     */
    public function boot()
    {
        //get popular tags
        View::composer('partials.popularTags', function ($view) {
            $view->with('popularTags', Tag::popular(10));
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
