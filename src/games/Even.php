<?php

namespace Brain\Games\Even;

use function Brain\Games\run;
use function cli\line;
use function cli\prompt;

use const Brain\Games\COUNT_ROUNDS;

/**
 * @throws \Exception
 */
function gameEven(): void
{
    $name = run();
    $count = 0;
    line('Answer "yes" if the number is even, otherwise answer "no".');
    $reference = [
        'yes' => true,
        'no' => false
    ];
    do {
        $numberValue = random_int(1, 99);
        $isEven = isEven($numberValue);
        line('Question: %s', $numberValue);
        $answer = prompt('Your answer');
        if (array_key_exists($answer, $reference) && ($reference[$answer] === $isEven)) {
            $count++;
            line('Correct!');
        } else {
            break;
        }
    } while ($count < COUNT_ROUNDS);

    if ($count === COUNT_ROUNDS) {
        line('Congratulations, %s!', $name);
    } else {
        line('Let\'s try again, %s!', $name);
    }
}

/**
 * @param int $value
 * @return bool
 */
function isEven(int $value): bool
{
    if (boolval($value & 1)) {
        return false;
    }
    return true;
}
