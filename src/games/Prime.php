<?php

namespace Brain\Games\Prime;

use function Brain\Games\run;
use function cli\line;
use function cli\prompt;

use const Brain\Games\COUNT_ROUNDS;

const MAX_NUMBER = 200;

/**
 * @throws \Exception
 */
function gamePrime(): void
{
    $name = run();
    $count = 0;
    line('Answer "yes" if given number is prime. Otherwise answer "no".');
    $primeArray = eratosthenesArray(MAX_NUMBER);
    do {
        $numberValueOne = random_int(2, MAX_NUMBER);
        line('Question: %s', $numberValueOne);
        $answer = prompt('Your answer');
        $answerArray = [];
        $answerArray['yes'] = true;
        $answerArray['no'] = false;
        $result = in_array($numberValueOne, $primeArray, true);
        if ($result === $answerArray[$answer]) {
            $count++;
            line('Correct!');
        } else {
            break;
        }
    } while ($count < COUNT_ROUNDS);

    if ($count === COUNT_ROUNDS) {
        line('Congratulations, %s!', $name);
    } else {
        $waitedAnswer = array_search($result, $answerArray, true);
        line('\'%s\' is wrong answer ;(. Correct answer was \'%s\'.', $answer, $waitedAnswer);
        line('Let\'s try again, %s!', $name);
    }
}

/**
 * @param int $maxDiapason
 * @return array
 */
function eratosthenesArray(int $maxDiapason): array
{
    $result = [];
    for ($i = 2; $i <= $maxDiapason; $i++) {
        $result[] = $i;
    }

    $arrLength = count($result);

    //do not replace to foreach
    for ($i = 0, $j = 0; $i < $arrLength; $i++) {
        if ($result[$i] !== null) {
            $quad = $result[$i] ** 2;
            if ($quad > $maxDiapason) {
                break;
            }
            $j = array_search($quad, $result, true);
        } else {
            continue;
        }
        while ($j < $arrLength) {
            $result[$j] = null;
            $j += $result[$i];
        }
    }
    return array_diff($result, [0, null]);
}
