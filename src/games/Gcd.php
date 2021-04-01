<?php

namespace Brain\Games\Gcd;

use function Brain\Games\run;
use function cli\line;
use function cli\prompt;

use const Brain\Games\COUNT_ROUNDS;

/**
 * @throws \Exception
 */
function gameGcd(): void
{
    $name = run();
    $count = 0;
    line('Find the greatest common divisor of given numbers.');
    do {
        $numberValueOne = random_int(0, 99);
        $numberValueTwo = random_int(0, 99);
        line('Question: %s %s', $numberValueOne, $numberValueTwo);
        $answer = prompt('Your answer');
        $result = gcd($numberValueOne, $numberValueTwo);
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
 * @param int $firstValue
 * @param int $secondValue
 * @return int
 */
function gcd(int $firstValue, int $secondValue): int
{
    while (true) {
        if ($firstValue === $secondValue) {
            return $secondValue;
        }
        if ($firstValue > $secondValue) {
            $firstValue -= $secondValue;
        } else {
            $secondValue -= $firstValue;
        }
    }
}
