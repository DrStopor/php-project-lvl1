<?php

namespace Brain\Games;

use function Brain\Games\Cli\askName;

class Engine
{
    protected $name;
    protected const COUNT_ROUNDS = 3;

    /**
     * Initialization
     */
    public function run(): void
    {
        $this->name = askName();
    }

    public function game(): void
    {
    }
}
