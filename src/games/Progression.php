<?php

namespace Brain\Games\Progression;

use function Brain\Games\run;
use function cli\line;
use function cli\prompt;

use const Brain\Games\COUNT_ROUNDS;

/**
 * @throws \Exception
 */
function gameProgression(): void
{
    $name = run();
    $count = 0;
    line('What number is missing in the progression?');
    do {
        $numberValueOne = random_int(0, 11);
        $numberValueTwo = 0;
        do {
            $numberValueTwo = random_int(0, 29);
        } while ($numberValueOne >= $numberValueTwo);
        $lengthArray = random_int(5, 12);
        $sourceArray = initProgressionArray($numberValueOne, $numberValueTwo, $lengthArray);
        $questionArray = getQuestionArray($sourceArray, $lengthArray);
        $stringArray = '';
        foreach ($questionArray['array'] as $value) {
            $stringArray .= "{$value} ";
        }
        line('Question: %s', $stringArray);
        $answer = prompt('Your answer');
        $result = $questionArray['skipValue'];

        if ((int)$answer === $result) {
            $count++;
            line('Correct!');
        } else {
            break;
        }
        unset($numberValueOne, $numberValueTwo, $lengthArray, $sourceArray, $stringArray);
    } while ($count < COUNT_ROUNDS);

    if ($count === COUNT_ROUNDS) {
        line('Congratulations, %s!', $name);
    } else {
        line('\'%s\' is wrong answer ;(. Correct answer was \'%s\'.', $answer, $result);
        line('Let\'s try again, %s!', $name);
    }
}

/**
 * @param int $one
 * @param int $two
 * @param int $lengthArray
 * @return array
 */
function initProgressionArray(int $one, int $two, int $lengthArray): array
{
    $result = [];
    $difference = $two - $one;
    $result[] = $one;
    $result[] = $two;
    for ($i = 2; $i < $lengthArray; $i++) {
        $result[] = $result[$i - 1] + $difference;
    }
    return $result;
}

/**
 * @param array $valueArray
 * @param int $lengthArray
 * @return array
 * @throws \Exception
 */
function getQuestionArray(array $valueArray, int $lengthArray): array
{
    $result = [];
    $skipNumber = random_int(0, $lengthArray - 1);
    $skipValue = $valueArray[$skipNumber];
    $valueArray[$skipNumber] = '..';
    $result['array'] = $valueArray;
    $result['skipValue'] = $skipValue;
    return $result;
}
