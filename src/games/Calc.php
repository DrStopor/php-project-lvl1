<?php

namespace Brain\Games\Calc;

use function Brain\Games\run;
use function cli\line;
use function cli\prompt;

use const Brain\Games\COUNT_ROUNDS;

/**
 * @throws \Exception
 */
function gameCalc(): void
{
    $name = run();
    $count = 0;
    line('What is the result of the expression?');
    do {
        $numberValueOne = random_int(0, 99);
        $numberValueTwo = random_int(0, 99);
        $operation = getRandomOperation();
        line('Question: %s %s %s', $numberValueOne, $operation, $numberValueTwo);
        $answer =  prompt('Your answer');
        $result = mathResult($numberValueOne, $numberValueTwo, $operation);
        if ((int)$answer === $result) {
            $count++;
            line('Correct!');
        } else {
            break;
        }
    } while ($count < COUNT_ROUNDS);

    if ($count === COUNT_ROUNDS) {
        line('Congratulations, %s!', $name);
    } else {
        line('\'%s\' is wrong answer ;(. Correct answer was \'%s\'.', $answer, $result);
        line('Let\'s try again, %s!', $name);
    }
}

/**
 * @param int $a
 * @param int $b
 * @param string $operation
 * @return int
 */
function mathResult(int $a, int $b, string $operation): int
{
    $result = 0;
    switch ($operation) {
        case '-':
            $result = $a - $b;
            break;
        case '+':
            $result = $a + $b;
            break;
        case '*':
            $result = $a * $b;
            break;
    }
    return $result;
}

/**
 * @return string
 * @throws \Exception
 */
function getRandomOperation(): string
{
    $range = random_int(0, 2);
    switch ($range) {
        case 0:
            return '-';
        case 1:
            return '+';
        case 2:
            return '*';
    }
    return '+';
}
