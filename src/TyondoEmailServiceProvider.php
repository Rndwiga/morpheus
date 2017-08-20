<?php

namespace Tyondo\Email;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Tyondo\Email\Commands\Install;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Tyondo\Email\Commands\Publish\Migrations;
use Tyondo\Email\Commands\Publish\Views;
use Tyondo\Email\Commands\Publish\Assets;
use Tyondo\Email\Commands\Publish\Config;
use Tyondo\Email\Commands\Publish\Packages;
use Illuminate\Database\Eloquent\Factory as EloquentFactory;

class TyondoEmailServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;
    protected $providers = [
        'Collective\Html\HtmlServiceProvider',
    ];
    protected $aliases = [
        'Form' => 'Collective\Html\FormFacade',
        'Html' => 'Collective\Html\HtmlFacade',
        'TyondoEmail' => 'Tyondo\Email\TyondoEmail',
    ];
    protected $publishableDir = __DIR__ . '/Publishable/';
    protected $basePath = __DIR__;

    /**
     * List of commands.
     *
     * @var array
     */
    protected $commands = [
	Install::class,        
	Views::class,
	Migrations::class,
	Assets::class,
	Config::class,
    Packages::class,
    ];

    /**
     * Configuration files.
     */
    private function registerConfigs()
    {
        $configPath = $this->publishableDir.'Config/temail.php';
        // Allows any modifications from the published config file to be seamlessly merged with default config file
        $this->mergeConfigFrom($configPath, 'temail');
    }

    /**
     * View files.
     */
    private function publishResources()
    {

        $publishable = [
            'public' => [
                "$this->publishableDir./Public/temail/" => public_path('vendor/tyondo/temail'),
            ],
            'migrations' => [
                "$this->basePath/Database/migrations" => database_path('migrations'),
            ],
            'seeds' => [
                "$this->publishableDir./Database/seeds/" => database_path('seeds'),
            ],
            'lang' => [
                "$this->publishableDir./Resources/" => base_path('resources/views/vendor/tyondo/temail'),
            ],
            'views' => [
                "$this->publishableDir./Resources/views/" => base_path('resources/views/vendor/TyondoEmail'),
            ],
            'config' => [
                "$this->publishableDir/Config/temail.php" => config_path('temail.php'),
            ],
        ];

        foreach ($publishable as $group => $paths) {
            $this->publishes($paths, $group);
        }
    }

    /**
     * Migration files.
     */
    private function handleMigrations()
    {
        // Load the migrations...
        $this->loadMigrationsFrom("$this->basePath/Database/migrations");
    }

    /**
     * Command files.
     */
    private function handleCommands()
    {
        // Register the commands...
        if ($this->app->runningInConsole()) {
            $this->commands($this->commands);
        }
    }

    /**
     * Register factory files.
     *
     * @param  string  $path
     * @return void
     */
    protected function registerEloquentFactoriesFrom($path)
    {
        $this->app->make(EloquentFactory::class)->load($path);
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        //Schema::defaultStringLength(191);
        $this->registerConfigs();
        $this->handleMigrations();
        $this->publishResources();
        $this->handleCommands();

	// Load the views...
        $this->loadViewsFrom($this->publishableDir.'Resources/views', 'TyondoEmail');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $loader = AliasLoader::getInstance();
        $router = $this->app['router'];

        // Register factories...
        $this->registerEloquentFactoriesFrom($this->publishableDir.'Database/factories');

        // Register service providers...
        $this->registerServiceProviders();
        // Register facades...
        $this->registerAliases();

        // Register middleware...

        $this->app->singleton('TyondoEmail', function() {
            return new TyondoEmail();
        });

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
    /**
     * @return void
     */
    private function registerServiceProviders()
    {
        foreach ($this->providers as $provider)
        {
            $this->app->register($provider);
        }
    }
    /**
     * @return void
     */
    private function registerAliases()
    {
        $loader = AliasLoader::getInstance();
        foreach ($this->aliases as $key => $alias)
        {
            $loader->alias($key, $alias);
        }
    }
}
