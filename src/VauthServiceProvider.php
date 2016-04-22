<?php

namespace Thienkimlove\Vauth;

use Illuminate\Support\ServiceProvider;

class VauthServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @param VauthRegistrar $registrar
     */
    public function boot(VauthRegistrar $registrar)
    {
        if (is_dir(base_path() . '/resources/views/thienkimlove/vauth')) {
            $this->loadViewsFrom(base_path() . '/resources/views/thienkimlove/vauth', 'vauth');
        } else {
            $this->loadViewsFrom(__DIR__.'/views', 'vauth');
        }
        $this->publishes([
            __DIR__.'/migrations/' => database_path('migrations')
        ]);

        $this->publishes([
            __DIR__.'/views/' => resource_path('views/vendor/vauth')
        ]);

        $this->publishes([
            __DIR__.'/vauth.php' => config_path('vauth.php')
        ]);

        if (!class_exists('CreatePostsTable')) {
            // Publish the migration
            $timestamp = date('Y_m_d_His', time());
            $this->publishes([
                __DIR__.'/migrations/create_posts_table.php.stub' => $this->app->databasePath().'/migrations/'.$timestamp.'_create_posts_table.php',
            ], 'migrations');
        }

        if (!class_exists('CreateVedPermission')) {
            // Publish the migration
            $timestamp = date('Y_m_d_His', time());
            $this->publishes([
                __DIR__.'/migrations/create_ved_permission.php.stub' => $this->app->databasePath().'/migrations/'.$timestamp.'_create_ved_permission.php',
            ], 'migrations');
        }

        $registrar->registerPermissions();
       
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {        
        $this->app->make('Thienkimlove\Vauth\PostsController');
        $this->mergeConfigFrom(
            __DIR__.'/vauth.php', 'vauth'
        );       
    }
}
