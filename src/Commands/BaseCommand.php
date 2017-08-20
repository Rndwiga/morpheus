<?php

namespace Tyondo\Email\Commands;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;
use Exception;
use Illuminate\Console\Command;

class BaseCommand extends Command
{

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    protected function progress($tasks)
    {
        $bar = $this->output->createProgressBar($tasks);

        for ($i = 0; $i < $tasks; $i++) {
            time_nanosleep(0, 200000000);
            $bar->advance();
        }

        $bar->finish();
    }
}
