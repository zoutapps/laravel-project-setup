<?php

namespace Zoutapps\Laravel\ProjectSetup\Commands\Dependency;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;
use Zoutapps\Laravel\ProjectSetup\Models\Dependency;

class AddCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'dependency:add 
                                {name} : the composer name of this dependency
                                {group=custom} : the dependency group this should be installed for 
                                {--dev} : add only as dev-dependency';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Add a new composer dependency to your scaffolding';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        Dependency::insert([
            'name' => $this->argument('name'),
            'dev' => $this->option('dev'),
            'group' => $this->argument('group')
        ]);
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
