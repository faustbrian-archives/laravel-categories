<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Categories.
 *
 * (c) Konceiver <info@konceiver.dev>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Konceiver\Categories\Providers;

use Illuminate\Support\ServiceProvider;

class CategoriesServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/categories.php', 'categories');
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

            $this->publishes([
                __DIR__.'/../config/categories.php' => $this->app->configPath('categories.php'),
            ], 'config');

            $this->publishes([
                __DIR__.'/../database/migrations/' => $this->app->databasePath('migrations'),
            ], 'migrations');
        }
    }
}
