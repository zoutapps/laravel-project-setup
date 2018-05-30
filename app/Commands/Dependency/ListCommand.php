<?php

namespace Zoutapps\Laravel\ProjectSetup\Commands\Dependency;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;
use Zoutapps\Laravel\ProjectSetup\Models\Dependency;

class ListCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'dependency:list';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'List all currently registered dependencies';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        $dependencies = Dependency::orderBy('name')->get();

        $this->table(['name', 'dev', 'group'], $dependencies->map(function($dependency) {
            return [$dependency->name, $dependency->dev ? 'TRUE' : 'FALSE', $dependency->group];
        }));
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
