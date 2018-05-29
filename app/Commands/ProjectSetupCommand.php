<?php

namespace Zoutapps\Laravel\ProjectSetup\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;
use Zoutapps\Laravel\ProjectSetup\Commands\Traits\CanExecuteProcess;

class ProjectSetupCommand extends Command
{
    use CanExecuteProcess;

    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'start 
                                {name?} : The name of the new application}
                                {--debug} : Show process output or not. Useful for debugging.';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Start the setup process for creating a new laravel project';

    /**
     * Create a new command instance.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        $this->info('Starting the setup process for creating a new laravel project');
        $this->notify("Zoutapps ProjectSetup", 'Starting the setup process for creating a new laravel project');

        $this->createLaravelProject();

        // TODO:
        // * ask some questions?
        // * install predefined dependencies
        // *

    }

    private function createLaravelProject()
    {
        $this->info('Create the laravel project');
        $command = 'laravel new';
        if ($name = $this->argument('name')) {
            $command .= ' ' . $name;
        }

        $this->executeProcess($command);
        $this->info('project created');
    }

    /**
     * Define the command's schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     *
     * @return void
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
