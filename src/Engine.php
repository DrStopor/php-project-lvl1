<?php


namespace Brain\Games;


use function Brain\Games\Cli\askName;
use function cli\line;
use function cli\prompt;

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

    public function Game(): void{

    }
}