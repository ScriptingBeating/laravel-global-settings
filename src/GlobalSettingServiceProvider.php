<?php

namespace ScriptingBeating\GlobalSetting;

use Illuminate\Support\ServiceProvider;

class GlobalSettingServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
		// $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        if ($this->app->runningInConsole()) {
			$this->publishes([
                __DIR__.'/../database/create_global_settings_table.php' =>
					database_path('migrations/'.date('Y_m_d_His').'_create_global_settings_table.php'),
            ], 'migrations');

//            $this->publishes([
//                __DIR__.'/../config/config.php' => config_path('global-settings.php'),
//            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'global-settings');

        // Register the main class to use with the facade
        $this->app->singleton('global-setting', static function () {
            return new GlobalSettingService;
        });
    }
}
