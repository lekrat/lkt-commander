<?php

namespace Lkt\Commander;

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Command\Command;

final class Commander
{
    private static $consoleCommands = [];

    /**
     * @param Command $command
     * @return void
     */
    public static function register(Command $command)
    {
        Commander::$consoleCommands[] = $command;
    }

    /**
     * @return void
     * @throws \Exception
     */
    public static function run(): void
    {
        $application = Commander::getApp();
        $application->run();
    }

    /**
     * @return Application
     * @throws \Exception
     */
    private static function getApp(): Application
    {
        $application = new Application();

        foreach (Commander::$consoleCommands as $command) {
            $application->add($command);
        }

        return $application;
    }
}