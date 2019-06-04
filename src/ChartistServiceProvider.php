<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Chartist.
 *
 * (c) Brian Faust <hello@basecode.sh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Artisanry\Chartist;

use Illuminate\Support\ServiceProvider;

class ChartistServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/chartist'),
        ], 'views');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'chartist');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->singleton('chartist', function ($app) {
            return new Builder();
        });
    }
}
