<?php

namespace Tyondo\Email\Commands;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Exception;

class Install extends BaseCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 't-email:install {--y|y : Skip question?} {--views : Also publish TyondoSms views.} {--f|force : Overwrite existing files.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Tyondo Email install wizard';

    /**
     * Create a new command instance.
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     *
     * @return mixed
     */
    public function handle()
    {

            // Gather the options...
            $force = $this->option('force') ?: false;
            $withViews = $this->option('views') ?: false;

            $this->comment(PHP_EOL.'Welcome to the Tyondo Email Install Wizard! You\'ll be up and running in no time...');

            try {
                $this->comment(PHP_EOL.'Publishing assets...');
                // Publish config files...
                Artisan::call('t-email:publish:config', [
                    '--y' => true,
                    '--force' => true,
                ]);
                $this->progress(1);
                $this->line(PHP_EOL.'<info>✔</info> Success! config file published.');
                // Publish public assets...
                Artisan::call('t-email:publish:assets', [
                    '--y' => true,
                    '--force' => true,
                ]);
                $this->progress(2);
                $this->line(PHP_EOL.'<info>✔</info> Success! asset files published.');
                // Publish aggregator extra package files...
                Artisan::call('t-email:publish:packages', [
                    '--y' => true,
                    '--force' => false,
                ]);
                $this->progress(3);
                $this->line(PHP_EOL.'<info>✔</info> Success! extra package resources published.');
                // Publish view files...
                if ($withViews) {
                    Artisan::call('t-email:publish:views', [
                        '--y' => true,
                        '--force' => $force,
                    ]);
                }

                // Set up the database...
                    $this->comment(PHP_EOL.'Setting up your database...');
                    $exitCode = Artisan::call('migrate', [
                        //'--path' => realpath(__DIR__.'/../Database/migrations'),
                    ]);
                $this->progress(4);
                $this->line(PHP_EOL.'<info>✔</info> Success! migration run.');

                $this->info(PHP_EOL.'Adding email routes to routes/web.php');
                $this->progress(5);
                File::append(
                    base_path('routes/web.php'),
                    "\n\nRoute::group(['prefix' => 'tyondo'], function () {\n    TyondoEmail::routes();\n});\n"
                );


                // Clear the caches...
                $this->info(PHP_EOL.'Clearing cached files');
                Artisan::call('cache:clear');
                Artisan::call('view:clear');
                Artisan::call('route:clear');
                $this->progress(6);
                $this->line(PHP_EOL.'<info>✔</info> Success! cache cleared.');

                $this->line(PHP_EOL.'<info>✔</info> Package successfully installed'.PHP_EOL);

                $this->line(PHP_EOL);

               // $config->save();
            } catch (Exception $e) {
                // Display message
                $this->line(PHP_EOL.'<error>An unexpected error occurred. Installation could not continue.</error>');
                $this->error("✘ {$e->getMessage()}");
                $this->comment(PHP_EOL.'Please run the installer again.');
                $this->line(PHP_EOL.'If this error persists please consult tyondo Enterprise.'.PHP_EOL);
            }

    }
}
