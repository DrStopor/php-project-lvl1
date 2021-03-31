<?php

namespace Brain\Games;

use function Brain\Games\Cli\askName;

abstract class Engine
{
    protected string $name;
    protected const COUNT_ROUNDS = 3;

    /**
     * Initialization
     */
    public function run(): void
    {
        $this->name = askName();
    }

    abstract public function game(): void;
}
