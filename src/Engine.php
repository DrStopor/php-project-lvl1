<?php

namespace Brain\Games;

use function Brain\Games\Cli\askName;

const COUNT_ROUNDS = 3;

function run(): string
{
    return askName();
}
