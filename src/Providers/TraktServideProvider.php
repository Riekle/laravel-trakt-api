<?php
/**
 * User: Riekle
 * Date: 25-12-2019
 */
namespace DucksCode\Trakt\ServiceProviders;

use Illuminate\Support\ServiceProvider;
use DucksCode\Trakt\Trakt;

class TraktServiceProvider extends ServiceProvider {
	public function boot(  ) {
		$this->app->singleton(Trakt::class, function () {
			return new Trakt();
		});
		$this->app->alias(Trakt::class, 'trakt');

        // Load routes
        $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
        
        // Publishes config upon running of the publish command
		$this->publishes([
			__DIR__.'/../config.php' => config_path('trakt.php'),
		]);

		// Migrations folder
		$this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
	}

	public function register() {
		$this->mergeConfigFrom(
			__DIR__.'/../../config/config.php', 'trakt'
		);

		$this->app->bind('trakt', function($app) {
            return new Trakt();
        });
	}

	/**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [Trakt::class];
    }
}