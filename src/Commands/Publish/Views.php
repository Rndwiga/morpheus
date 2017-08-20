<?php

namespace Tyondo\Email\Commands\Publish;

use Illuminate\Support\Facades\Artisan;
use Tyondo\Email\Commands\BaseCommand;


class Views extends BaseCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 't-email:publish:views {--y|y : Skip question?} {--f|force : Overwrite existing files.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish tyondo email view files';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Gather arguments...
        $publish = $this->option('y') ?: false;
        $force = $this->option('force') ?: false;

        if (! $publish) {
            $publish = $this->confirm('Publish email core view files?');
        }

        // Publish views...
        if ($publish) {
            $exitCode = Artisan::call('vendor:publish', [
                '--provider' => 'Tyondo\Email\TyondoEmailServiceProvider',
                '--tag' => 'views',
                '--force' => $force,
            ]);
            $this->progress(5);
            $this->line(PHP_EOL.'<info>✔</info> Success! Email core view files have been published.');
        }
    }
}
