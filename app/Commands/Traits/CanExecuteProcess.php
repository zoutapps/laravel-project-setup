<?php

namespace Zoutapps\Laravel\ProjectSetup\Commands\Traits;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

trait CanExecuteProcess
{
    /**
     * Run a SSH command.
     *
     * @param string $command      The SSH command that needs to be run
     * @param bool   $beforeNotice Information for the user before the command is run
     * @param bool   $afterNotice  Information for the user after the command is run
     *
     * @return mixed Command-line output
     */
    public function executeProcess($command, $beforeNotice = false, $afterNotice = false)
    {
        $this->echo('info', $beforeNotice ? ' '.$beforeNotice : $command);

        $process = new Process($command);
        $process->run(function ($type, $buffer) {
            if (Process::ERR === $type) {
                $this->echo('comment', $buffer);
            } else {
                $this->echo('line', $buffer);
            }
        });

        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        if ($afterNotice) {
            $this->echo('info', $afterNotice);
        }
    }

    /**
     * Write text to the screen for the user to see.
     *
     * @param [string] $type    line, info, comment, question, error
     * @param [string] $content
     */
    public function echo($type, $content)
    {
        if ($this->option('debug') == false) {
            return;
        }
        // skip empty lines
        if (trim($content)) {
            $this->{$type}($content);
        }
    }
}