<?php

namespace Brain\Games\games;

use Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

class Progression extends Engine
{
    public function game(): void
    {
        $count = 0;
        line('What number is missing in the progression?');
        do {
            $numberValueOne = random_int(0, 11);
            $numberValueTwo = 0;
            do {
                $numberValueTwo = random_int(0, 29);
            } while ($numberValueOne >= $numberValueTwo);
            $lengthArray = random_int(5, 12);
            $sourceArray = $this->initProgressionArray($numberValueOne, $numberValueTwo, $lengthArray);
            $questionArray = $this->getQuestionArray($sourceArray, $lengthArray);
            $stringArray = '';
            foreach ($questionArray['array'] as $value) {
                $stringArray .= "{$value} ";
            }
            line('Question: %s', $stringArray);
            $answer =  prompt('Your answer');
            $result = $questionArray['skipValue'];

            if ((int)$answer === $result) {
                $count++;
                line('Correct!');
            } else {
                break;
            }
            unset($numberValueOne, $numberValueTwo, $lengthArray, $sourceArray, $stringArray);
        } while ($count < self::COUNT_ROUNDS);

        if ($count === self::COUNT_ROUNDS) {
            line('Congratulations, %s!', $this->name);
        } else {
            line('\'%s\' is wrong answer ;(. Correct answer was \'%s\'.', $answer, $result);
            line('Let\'s try again, $s!', $this->name);
        }
    }

    private function initProgressionArray(int $one, int $two, $lengthArray): Array
    {
        $difference = $two - $one;
        $result[] = $one;
        $result[] = $two;
        for ($i = 2; $i < $lengthArray; $i++) {
            $result[] = $result[$i - 1] + $difference;
        }
        return $result;
    }

    private function getQuestionArray($valueArray, $lengthArray): Array
    {
        $skipNumber = random_int(0, $lengthArray - 1);
        $skipValue = $valueArray[$skipNumber];
        $valueArray[$skipNumber] = '..';
        $result['array'] = $valueArray;
        $result['skipValue'] = $skipValue;
        return $result;
    }
}