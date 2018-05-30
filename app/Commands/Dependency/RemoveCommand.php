<?php

namespace Zoutapps\Laravel\ProjectSetup\Commands\Dependency;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;
use Zoutapps\Laravel\ProjectSetup\Models\Dependency;

class RemoveCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'dependency:remove {name}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Remove a composer dependency from your scaffolding.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        Dependency::where('name', 'LIKE', $this->argument('name').'%')->delete();
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
