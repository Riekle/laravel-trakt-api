<?php
/**
 * User: Riekle
 * Date: 25-12-2019
 */
namespace DucksCode\Trakt;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use DucksCode\Trakt\Facades\Trakt;

class TraktServiceProvider extends ServiceProvider {
	public function boot(  ) {
		$this->registerResources();
	}

	public function register() {
		$this->mergeConfigFrom(
			__DIR__.'/../config/trakt.php', 'trakt'
		);
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
	
	public function registerResources() {
		$this->loadMigrationsFrom(__DIR__.'/../database/migrations'); // Load migrations
		$this->loadViewsFrom(__DIR__ . '/../resources/views', 'trakt'); // Load views

		$this->registerPublishing();
		$this->registerFacades();
		$this->registerRoutes();
	}

	/**
	 * Register the package's publishable resources.
	 *
	 * @return void
	 */
	protected function registerPublishing() {        
        // Publishes config upon running of the publish command
		$this->publishes([
			__DIR__.'/../config/trakt.php' => config_path('trakt.php'),
		]);
	}

	/**
	 * Register any bindings to the app
	 *
	 * @return void
	 */
	protected function registerFacades() {
		$this->app->singleton(Trakt::class, function () {
			return new \DucksCode\Trakt\Trakt();
		});
		$this->app->alias(Trakt::class, 'trakt');

	}

	protected function registerRoutes() {
		$routeConfig = [
			'prefix' => Trakt::path(),
			'as' => 'trakt.',
			'namespace' => 'DucksCode\Trakt',
		];
		// Load routes
		if (!$this->app->routesAreCached()) {
			Route::group($routeConfig, function() {
				Route::view('/test', 'trakt::index')->name('test');
				$this->loadRoutesFrom(__DIR__.'/../routes/web.php');
			});
		}
	}
}