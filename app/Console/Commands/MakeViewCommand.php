<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;

class MakeViewCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:make-view-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new blade template';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $view = $this->argument('view');
        $path = $this->viewPath($view);
        $this->createDir($path);
        if (File::exists($path)) {

            $this->error("View $view already exists!");
        }
        File::put($path, $view);
        $this->info("View $view created successfully!");
    }
}
